<?php

namespace Drupal\push_framework\Plugin\migrate\destination;

use Drupal\push_framework\Service;
use Drupal\user\Plugin\migrate\destination\UserData;
use Drupal\migrate\Row;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;

/**
 * @MigrateDestination(
 *   id = "push_framework_user_data"
 * )
 */
class BlockPushUserData extends UserData implements ContainerFactoryPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function import(Row $row, array $old_destination_id_values = []) {
    $uid = $row->getDestinationProperty('uid');
    $module = 'push_framework';
    $key = Service::BLOCK_PUSH;
    $value = (bool) $row->getDestinationProperty('flag');
    $this->userData->set($module, $uid, $key, $value);

    return [$uid, $module, $key];
  }

}
