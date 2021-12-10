<?php

namespace Drupal\amazon_ses;

use Drupal\Core\Config\ConfigFactory;
use Aws\Ses\SesClient;

/**
 * Factory class for AWS SesClient instances.
 */
class AmazonSesClientFactory {

  /**
   * Creates an AWS SesClient instance.
   *
   * @param array $options
   *   The default client options.
   * @param \Drupal\Core\Config\ConfigFactory $configFactory
   *   The config factory.
   *
   * @return \Aws\Ses\SesClient
   *   The client instance.
   */
  public static function createInstance(array $options, ConfigFactory $configFactory) {
    $settings = $configFactory->get('aws_secrets_manager.settings');

    $options['region'] = $settings->get('aws_region');

    $awsKey = $settings->get('aws_key');
    $awsSecret = $settings->get('aws_secret');

    if (!empty($awsKey) && !empty($awsSecret)) {
      $options['credentials'] = [
        'key' => $awsKey,
        'secret' => $awsSecret,
      ];
    }

    return new SesClient($options);
  }

}
