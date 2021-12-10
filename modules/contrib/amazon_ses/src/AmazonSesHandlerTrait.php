<?php

namespace Drupal\amazon_ses;

/**
 * Amazon SES handler trait.
 */
trait AmazonSesHandlerTrait {

  /**
   * The Amazon SES handler service.
   *
   * @var \Drupal\amazon_ses\AmazonSesHandlerInterface
   */
  protected $handler;

  /**
   * Set the handler object.
   *
   * @param \Drupal\amazon_ses\AmazonSesHandlerInterface $handler
   *   The handler object.
   *
   * @return $this
   */
  protected function setHandler(AmazonSesHandlerInterface $handler) {
    $this->handler = $handler;

    return $this;
  }

}
