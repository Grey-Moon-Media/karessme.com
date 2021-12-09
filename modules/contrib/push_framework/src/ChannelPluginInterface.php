<?php

namespace Drupal\push_framework;

use Drupal\Component\Plugin\PluginInspectionInterface;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\UserInterface;

/**
 * Interface for push_framework plugins.
 */
interface ChannelPluginInterface extends PluginInspectionInterface {

  public const RESULT_STATUS_SUCCESS = 'success';
  public const RESULT_STATUS_RETRY = 'retry';
  public const RESULT_STATUS_FAILED = 'failed';

  /**
   * Returns the name of the config.
   *
   * @return string
   */
  public function getConfigName(): string;

  /**
   * Returns if this plugin is enabled.
   *
   * @return bool
   */
  public function isActive(): bool;

  /**
   * Returns the translated plugin label.
   *
   * @return string
   *   The translated title.
   */
  public function label(): string;

  /**
   * @param \Drupal\user\UserInterface $user
   *
   * @return bool
   */
  public function applicable(UserInterface $user): bool;

  /**
   * Sends the given notification.
   *
   * @param \Drupal\user\UserInterface $user
   * @param \Drupal\Core\Entity\ContentEntityInterface $entity
   * @param array $content
   * @param int $attempt
   *
   * @return string
   *   One fo the RESULT_STATUS_ constants above.
   */
  public function send(UserInterface $user, ContentEntityInterface $entity, array $content, int $attempt): string;

  /**
   * @param \Drupal\user\UserInterface $user
   * @param \Drupal\Core\Entity\ContentEntityInterface $entity
   *
   * @return array
   */
  public function prepareContent(UserInterface $user, ContentEntityInterface $entity): array;

}
