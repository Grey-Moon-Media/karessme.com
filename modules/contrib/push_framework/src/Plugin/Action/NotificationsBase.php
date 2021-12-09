<?php

namespace Drupal\push_framework\Plugin\Action;

use Drupal\Core\Access\AccessResultAllowed;
use Drupal\Core\Action\ActionBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\push_framework\Service;
use Drupal\user\UserDataInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Abstract class for NotificationsBlock and NotificationsAllow.
 *
 * @property $flag
 */
abstract class NotificationsBase extends ActionBase implements ContainerFactoryPluginInterface {

  /**
   * @var \Drupal\user\UserDataInterface
   */
  protected $userData;

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, UserDataInterface $user_data) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->userData = $user_data;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('user.data')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function access($object, AccountInterface $account = NULL, $return_as_object = FALSE) {
    return AccessResultAllowed::allowedIf($account !== NULL && $account->hasPermission('administer users'));
  }

  /**
   * {@inheritdoc}
   */
  public function execute($user = NULL) {
    $this->userData->set('push_framework', $user->id(), Service::BLOCK_PUSH, $this->flag);
  }

}
