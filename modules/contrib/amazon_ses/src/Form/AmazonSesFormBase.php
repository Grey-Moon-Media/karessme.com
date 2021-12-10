<?php

namespace Drupal\amazon_ses\Form;

use Drupal\Core\Form\FormBase;
use Drupal\amazon_ses\AmazonSesHandlerTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Amazon SES form base class.
 */
abstract class AmazonSesFormBase extends FormBase {
  use AmazonSesHandlerTrait;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = new static();
    $instance->setHandler($container->get('amazon_ses.handler'));

    return $instance;
  }

}
