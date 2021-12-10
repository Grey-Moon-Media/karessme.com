<?php

namespace Drupal\amazon_ses;

use Aws\Ses\SesClient;
use Aws\Exception\CredentialsException;
use Aws\Ses\Exception\SesException;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Logger\LoggerChannelInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Amazon SES service.
 */
class AmazonSesHandler implements AmazonSesHandlerInterface {
  use StringTranslationTrait;

  /**
   * The AWS SesClient.
   *
   * @var \Aws\Ses\SesClient
   */
  protected $client;

  /**
   * The logger channel.
   *
   * @var \Drupal\Core\Logger\LoggerChannelInterface
   */
  protected $logger;

  /**
   * The config object.
   *
   * @var \Drupal\Core\Config\ImmutableConfig
   */
  protected $config;

  /**
   * Constructs the service.
   *
   * @param \Aws\Ses\SesClient $client
   *   The AWS SesClient.
   * @param \Drupal\Core\Logger\LoggerChannelInterface $logger
   *   The logger factory service.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   */
  public function __construct(SesClient $client, LoggerChannelInterface $logger, ConfigFactoryInterface $config_factory) {
    $this->client = $client;
    $this->logger = $logger;
    $this->config = $config_factory->get('amazon_ses.settings');
  }

  /**
   * {@inheritdoc}
   */
  public function send(array $message) {
    if (!$message['from']) {
      $message['from'] = $this->config->get('from_address');
    }

    if (!$message['reply-to']) {
      $message['reply-to'] = $message['from'];
    }

    $params = [
      'Destination' => [
        'ToAddresses' => [$message['to']],
      ],
      'ReplyToAddresses' => [$message['reply-to']],
      'Source' => $message['from'],
      'Message' => [
        'Subject' => [
          'Data' => $message['subject'],
        ],
      ],
    ];

    if (isset($message['headers']) && isset($message['headers']['Content-Type'])) {
      $content_type_parts = explode(';', $message['headers']['Content-Type']);
      $content_type = trim($content_type_parts[0]);
    }
    else {
      $content_type = 'text/plain';
    }

    switch ($content_type) {
      case 'text/plain':
        $params['Message']['Body']['Text']['Data'] = $message['body'];
        break;

      case 'text/html':
        $params['Message']['Body']['Html']['Data'] = $message['body'];
        break;

      case 'multipart/mixed':
        $parts = $this->getParts($message);

        $params['Message']['Body']['Text']['Data'] = $parts['plain'];
        $params['Message']['Body']['Html']['Data'] = $parts['html'];
        break;

      default:
        $params['Message']['Body']['Text']['Data'] = $message['body'];

        $warning = $this->t('Unsupported content type: @type', [
          '@type' => $content_type,
        ]);
        $this->logger->warning($warning);
        break;
    }

    try {
      $result = $this->client->sendEmail($params);

      $throttle = $this->config->get('throttle');
      if ($throttle) {
        $sleep_time = $this->getSleepTime();
        usleep($sleep_time);
      }

      return $result['MessageId'];
    }
    catch (CredentialsException $e) {
      $this->logger->error($e->getMessage());
      return FALSE;
    }
    catch (SesException $e) {
      $this->logger->error($e->getAwsErrorMessage());
      return FALSE;
    }
  }

  /**
   * Get the plain text and HTML parts of a multipart MIME message.
   *
   * @param string $message
   *   The message body.
   *
   * @return array|false
   *   An array of the part contents, or FALSE if it could not be parsed.
   */
  protected function getParts($message) {
    $message_parts = [];

    // Parse the Content-Type header to find the boundary string.
    $content_type_parts = explode(';', $message['headers']['Content-Type']);
    foreach ($content_type_parts as $part) {
      if (strpos($part, 'boundary') !== FALSE) {
        $boundary_parts = explode('=', $part);
        $boundary = trim($boundary_parts[1], '"');
      }
    }

    // Exit if no boundary string is found.
    if (!$boundary) {
      return FALSE;
    }

    $body_parts = explode($boundary, $message['body']);
    foreach ($body_parts as $part) {
      if (strpos($part, 'multipart/alternative') !== FALSE) {
        $boundary_start = strpos($part, 'boundary') + 10;
        if ($boundary_start !== FALSE) {
          $boundary_end = strpos($part, '"', $boundary_start);
          $boundary_length = $boundary_end - $boundary_start;
          $alternative_boundary = substr($part, $boundary_start, $boundary_length);

          $alternative_parts = explode($alternative_boundary, $part);
          foreach ($alternative_parts as $part) {
            if (strpos($part, 'text/plain') !== FALSE) {
              $message_parts['plain'] = $this->getPartContent($part);
            }
            elseif (strpos($part, 'text/html') !== FALSE) {
              $message_parts['html'] = $this->getPartContent($part);
            }
          }
        }
      }
    }

    return $message_parts;
  }

  /**
   * Get the content from a MIME message part.
   *
   * @param string $part
   *   The message part.
   *
   * @return string|false
   *   The content, or FALSE if it could not be parsed.
   */
  protected function getPartContent($part) {
    $split = preg_split('#\r?\n\r?\n#', $part);

    if ($split && isset($split[1])) {
      return $split[1];
    }

    return FALSE;
  }

  /**
   * Get the number of microseconds to pause for throttling.
   *
   * @return int
   *   The time to sleep in microseconds.
   */
  protected function getSleepTime() {
    $per_second = $this->client->getSendQuota();
    $rate = ceil(1000000 / $per_second);

    return intval($rate);
  }

  /**
   * {@inheritdoc}
   */
  public function getIdentities() {
    $identities = [];

    $results = $this->client->listIdentities();

    foreach ($results->toArray()['Identities'] as $identity) {
      $result = $this->client->getIdentityVerificationAttributes([
        'Identities' => [$identity],
      ]);
      $attributes = $result->toArray()['VerificationAttributes'];

      $domain = array_key_exists('VerificationToken', $attributes[$identity]);
      $item = [
        'identity' => $identity,
        'status' => $attributes[$identity]['VerificationStatus'],
        'type' => $domain ? 'Domain' : 'Email Address',
      ];

      if ($domain) {
        $item['token'] = $attributes[$identity]['VerificationToken'];
      }

      $identities[] = $item;
    }

    return $identities;
  }

  /**
   * {@inheritdoc}
   */
  public function verifyIdentity($identity, $type) {
    switch ($type) {
      case 'domain':
        $this->client->verifyDomainIdentity([
          'Domain' => $identity,
        ]);
        break;

      case 'email':
        $this->client->verifyEmailIdentity([
          'EmailAddress' => $identity,
        ]);
        break;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function deleteIdentity($identity) {
    $this->client->deleteIdentity([
      'Identity' => $identity,
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function getSendQuota() {
    $results = $this->client->getSendQuota();

    return array_map('number_format', $results->toArray());
  }

  /**
   * {@inheritdoc}
   */
  public function getSendStatistics() {
    $statistics = [
      'DeliveryAttempts' => 1100,
      'Bounces' => 0,
      'Complaints' => 0,
      'Rejects' => 0,
    ];

    $results = $this->client->getSendStatistics();
    foreach ($results->toArray() as $key => $value) {
      $statistics[$key] += (int) $value;
    }

    return array_map('number_format', $statistics);
  }

}
