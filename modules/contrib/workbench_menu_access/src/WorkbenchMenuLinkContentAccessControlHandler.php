<?php

/**
 * Copyright (c) 2018 Palantir.net
 */

namespace Drupal\workbench_menu_access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Access\AccessManagerInterface;
use Drupal\Core\Entity\EntityHandlerInterface;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\menu_link_content\MenuLinkContentAccessControlHandler;

/**
 * Overrides the access control handler for the menu link entity type.
 */
class WorkbenchMenuLinkContentAccessControlHandler extends MenuLinkContentAccessControlHandler {

  /**
   * The access manager to check routes by name.
   *
   * @var \Drupal\Core\Access\AccessManagerInterface
   */
  protected $accessManager;

  /**
   * Creates a new MenuLinkContentAccessControlHandler.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   The entity type definition.
   * @param \Drupal\Core\Access\AccessManagerInterface $access_manager
   *   The access manager to check routes by name.
   */
  public function __construct(EntityTypeInterface $entity_type, AccessManagerInterface $access_manager) {
    parent::__construct($entity_type, $access_manager);

    $this->accessManager = $access_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function createInstance(ContainerInterface $container, EntityTypeInterface $entity_type) {
    return new static($entity_type, $container->get('access_manager'));
  }

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    static $menus;
    // We do nothing on View. See MenuLinkContentAccessControlHandler.
    if ($operation == 'view') {
      return parent::checkAccess($entity, $operation, $account);
    }
    // For all other operations, access is based on the parent menu.
    $manager = \Drupal::entityTypeManager();
    $menu = $manager->getStorage('menu')->load($entity->getMenuName());
    $handler = $manager->getAccessControlHandler('menu');
    if ($menu) {
      // If allowed by Workbench Menu Access, pass through to the parent.
      if ($account->hasPermission('administer workbench menu access') || $account->hasPermission('bypass workbench access')) {
        return parent::checkAccess($entity, $operation, $account);
      }
      // Internal cache for performance.
      $key = $menu->id() . ':' . $account->id();
      if (!isset($menus[$key])) {
        $menus[$key] = $handler->checkSections($menu, $account);
      }
      if ($menus[$key]) {
        return parent::checkAccess($entity, $operation, $account);
      }
      else {
        return AccessResult::forbidden()->addCacheableDependency($account);
      }
    }
    return parent::checkAccess($entity, $operation, $account);
  }

  /**
   * Public alias for checkAccess().
   */
  public function accessCheck(EntityInterface $entity, $operation, AccountInterface $account) {
    return $this->checkAccess($entity, $operation, $account);
  }

}
