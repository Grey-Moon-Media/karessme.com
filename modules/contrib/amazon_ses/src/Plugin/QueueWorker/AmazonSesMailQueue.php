<?php

namespace Drupal\amazon_ses\Plugin\QueueWorker;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use Drupal\amazon_ses\AmazonSesHandlerTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Amazon SES mail queue worker.
 *
 * @QueueWorker(
 *   id = "amazon_ses_mail_queue",
 *   title = @Translation("Amazon SES mail queue"),
 *   cron = {"time" = 60}
 * )
 */
class AmazonSesMailQueue extends QueueWorkerBase implements ContainerFactoryPluginInterface {
  use AmazonSesHandlerTrait;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $instance = new static(
      $configuration,
      $plugin_id,
      $plugin_definition
    );

    $instance->setHandler($container->get('amazon_ses.handler'));

    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function processItem($message) {
    $this->handler->send($message);
  }

}
