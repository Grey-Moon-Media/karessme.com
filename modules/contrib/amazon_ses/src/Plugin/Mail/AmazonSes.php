<?php

namespace Drupal\amazon_ses\Plugin\Mail;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Mail\MailInterface;
use Drupal\Core\Mail\Plugin\Mail\PhpMail;
use Drupal\Core\Queue\QueueFactory;
use Drupal\amazon_ses\AmazonSesHandlerTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Amazon SES mail system plugin.
 *
 * @Mail(
 *   id = "amazon_ses_mail",
 *   label = @Translation("Amazon SES mailer"),
 *   description = @Translation("Sends an email using Amazon SES.")
 * )
 */
class AmazonSes extends PhpMail implements MailInterface, ContainerFactoryPluginInterface {
  use AmazonSesHandlerTrait;

  /**
   * The config object.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $config;

  /**
   * The queue object.
   *
   * @var \Drupal\Core\Queue\QueueInterface
   */
  protected $queue;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $instance = new static(
      $container,
      $configuration,
      $plugin_id,
      $plugin_definition
    );

    $instance->setHandler($container->get('amazon_ses.handler'))
      ->setConfig($container->get('config.factory'))
      ->setQueue($container->get('queue'));

    return $instance;
  }

  /**
   * Set the config object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory object.
   *
   * @return $this
   */
  protected function setConfig(ConfigFactoryInterface $config_factory) {
    $this->config = $config_factory->get('amazon_ses.settings');

    return $this;
  }

  /**
   * Set the queue object.
   *
   * @param \Drupal\Core\Queue\QueueFactory $queue_factory
   *   The queue factory service.
   *
   * @return $this
   */
  protected function setQueue(QueueFactory $queue_factory) {
    $this->queue = $queue_factory->get('amazon_ses_mail_queue');

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function mail(array $message) {
    if ($this->config->get('queue')) {
      $result = $this->queue->createItem($message);

      return (bool) $result;
    }
    else {
      $message_id = $this->handler->send($message);

      return (bool) $message_id;
    }
  }

}
