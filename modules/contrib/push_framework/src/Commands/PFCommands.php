<?php

namespace Drupal\push_framework\Commands;

use Drupal\push_framework\Service;
use Drush\Commands\DrushCommands;

/**
 * A Drush commandfile.
 */
class PFCommands extends DrushCommands {

  /**
   * @var \Drupal\push_framework\Service
   */
  protected $service;

  /**
   * PFCommands constructor.
   *
   * @param \Drupal\push_framework\Service $service
   */
  public function __construct(Service $service) {
    parent::__construct();
    $this->service = $service;
  }

  /**
   * Execute all items on all source plugins.
   *
   * @usage pf:sources:collect
   *
   * @command pf:sources:collect
   */
  public function createNotifications(): void {
    $this->service->collectAllSourceItems();
  }

  /**
   * Push all items in the queue.
   *
   * @usage pf:queue:process
   *
   * @command pf:queue:process
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function processQueue(): void {
    $this->service->processQueue();
  }

}
