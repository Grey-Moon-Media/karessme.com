<?php

namespace Drupal\push_framework\Plugin\DanseRecipientSelection;

use Drupal\danse\PayloadInterface;

/**
 * Interface for DANSE recipient selection plugins with direct push.
 */
interface DirectPushInterface {

  /**
   * @param \Drupal\danse\PayloadInterface $payload
   *
   * @return string
   */
  public function push(PayloadInterface $payload): string;

  /**
   * @return string
   */
  public function directPushChannelId(): string;

}
