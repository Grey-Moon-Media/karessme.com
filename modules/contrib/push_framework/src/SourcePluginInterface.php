<?php

namespace Drupal\push_framework;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\UserInterface;

/**
 * Interface for push_framework plugins.
 */
interface SourcePluginInterface {

  /**
   * Returns the translated plugin label.
   *
   * @return string
   *   The translated title.
   */
  public function label(): string;

  /**
   * @return \Drupal\push_framework\SourceItem[]
   */
  public function getAllItemsForPush(): array;

  /**
   * @param string $oid
   *
   * @return \Drupal\Core\Entity\ContentEntityInterface|null
   */
  public function getObjectAsEntity($oid): ?ContentEntityInterface;

  /**
   * @param string $oid
   * @param \Drupal\user\UserInterface $user
   * @param \Drupal\push_framework\ChannelPluginInterface $channelPlugin
   * @param string $result
   *   One of the ChannelPluginInterface::RESULT_STATUS_* strings.
   *
   * @return \Drupal\push_framework\SourcePluginInterface
   */
  public function confirmAttempt($oid, UserInterface $user, ChannelPluginInterface $channelPlugin, $result): SourcePluginInterface;

  /**
   * @param string $oid
   * @param \Drupal\user\UserInterface $user
   *
   * @return \Drupal\push_framework\SourcePluginInterface
   */
  public function confirmDelivery($oid, UserInterface $user): SourcePluginInterface;

}
