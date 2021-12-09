<?php

namespace Drupal\push_framework;

use Drupal\advancedqueue\Entity\Queue;
use Drupal\advancedqueue\Entity\QueueInterface;
use Drupal\advancedqueue\Job;
use Drupal\advancedqueue\ProcessorInterface;
use Drupal\Component\Plugin\Exception\PluginException;
use Drupal\Core\Database\Connection;
use Drupal\Core\Entity\EntityStorageException;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\user\UserDataInterface;

/**
 * Logger service to write messages and exceptions to an external service.
 */
class Service {

  use StringTranslationTrait;

  public const BLOCK_PUSH = 'block push';

  /**
   * @var \Drupal\push_framework\SourcePluginManager
   */
  protected $pluginManager;

  /**
   * @var \Drupal\advancedqueue\ProcessorInterface
   */
  protected $processor;

  /**
   * @var \Drupal\advancedqueue\Entity\QueueInterface
   */
  protected $queue;

  /**
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * @var \Drupal\user\UserDataInterface
   */
  protected $userData;

  /**
   * @param \Drupal\push_framework\SourcePluginManager $plugin_manager
   * @param \Drupal\advancedqueue\ProcessorInterface $processor
   * @param \Drupal\Core\Database\Connection $database
   * @param \Drupal\user\UserDataInterface $user_data
   */
  public function __construct(SourcePluginManager $plugin_manager, ProcessorInterface $processor, Connection $database, UserDataInterface $user_data) {
    $this->pluginManager = $plugin_manager;
    $this->processor = $processor;
    $this->database = $database;
    $this->userData = $user_data;
  }

  /**
   * Get the Queue.
   *
   * @return \Drupal\advancedqueue\Entity\QueueInterface
   *
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  protected function queue(): QueueInterface {
    if ($this->queue === NULL) {
      $this->queue = Queue::load('push_framework');
      if ($this->queue === NULL) {
        $this->queue = Queue::create([
          'id' => 'push_framework',
          'label' => 'Push Framework',
          'backend' => 'database',
        ]);
        $this->queue->save();
      }
    }
    return $this->queue;
  }

  /**
   * @param \Drupal\push_framework\SourceItem $item
   *
   * @return bool
   */
  private function isItemQueued(SourceItem $item): bool {
    $existingItems = $this->database->select('advancedqueue', 'q')
      ->fields('q', ['payload'])
      ->condition('q.queue_id', 'push_framework')
      ->condition('q.type', 'pf_sourceitem')
      ->condition('q.state', 'success', '<>')
      ->condition('q.state', 'failed', '<>')
      ->execute()
      ->fetchCol();
    foreach ($existingItems as $existingItem) {
      /** @var \Drupal\push_framework\SourceItem $sourceItem */
      try {
        $sourceItem = SourceItem::fromArray($this->pluginManager, json_decode($existingItem, true));
        if ($sourceItem->equals($item)) {
          return TRUE;
        }
      }
      catch (PluginException $e) {
        // TODO: Log this exception.
      }
    }
    return FALSE;
  }

  /**
   * @return \Drupal\push_framework\SourcePluginInterface[]
   */
  protected function getPluginInstances(): array {
    $instances = [];
    foreach ($this->pluginManager->getDefinitions() as $id => $definition) {
      try {
        $instances[$id] = $this->pluginManager->createInstance($id);
      }
      catch (PluginException $e) {
        // We can savely ignore this here.
      }
    }
    return $instances;
  }

  /**
   * Collect items from all source plugins.
   */
  public function collectAllSourceItems(): void {
    foreach ($this->getPluginInstances() as $plugin) {
      foreach ($plugin->getAllItemsForPush() as $item) {
        if ($this->userData->get('push_framework', $item->getUid(), self::BLOCK_PUSH)) {
          // No push for this user.
          continue;
        }
        if (!$this->isItemQueued($item)) {
          $job = Job::create('pf_sourceitem', $item->toArray());
          try {
            $this->queue()->enqueueJob($job);
          }
          catch (EntityStorageException $e) {
            // TODO: Log this exception.
          }
        }
      }
    }
  }

  /**
   * Process all items in the advanced queue of the push framework.
   *
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function processQueue(): void {
    $this->processor->processQueue($this->queue());
  }

}
