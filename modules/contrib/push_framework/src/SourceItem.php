<?php

namespace Drupal\push_framework;

use Drupal\Component\Plugin\Exception\PluginException;
use Drupal\user\Entity\User;
use Drupal\user\UserInterface;

/**
 * Source item class.
 */
class SourceItem {

  /**
   * @var string
   */
  protected $oid;

  /**
   * @var int
   */
  protected $uid;

  /**
   * @var \Drupal\user\Entity\User
   */
  protected $user;

  /**
   * @var \Drupal\push_framework\SourceBase
   */
  protected $plugin;

  /**
   * @var bool
   */
  protected $initialized;

  /**
   * @var array
   */
  protected $tasks;

  /**
   * SourceItem constructor.
   *
   * @param \Drupal\push_framework\SourcePluginInterface $plugin
   * @param string $oid
   * @param int $uid
   */
  public function __construct(SourcePluginInterface $plugin, $oid, $uid) {
    $this->plugin = $plugin;
    $this->oid = $oid;
    $this->uid = $uid;
    $this->initialized = FALSE;
  }

  /**
   * @param \Drupal\push_framework\SourceItem $item
   *
   * @return bool
   */
  public function equals(SourceItem $item): bool {
    return $item->oid === $this->oid && $item->uid === $this->uid;
  }

  /**
   * @return int
   */
  public function getUid(): int {
    return $this->uid;
  }

  /**
   * @return \Drupal\user\UserInterface
   */
  protected function user(): UserInterface {
    if ($this->user === NULL) {
      $this->user = User::load($this->uid);
    }
    return $this->user;
  }

  /**
   * Determine tasks that need to be done.
   *
   * @param \Drupal\push_framework\ChannelPluginManager $channel_plugin_manager
   */
  protected function getTasks(ChannelPluginManager $channel_plugin_manager): void {
    if ($this->tasks === NULL) {
      $this->tasks = [];
      foreach ($channel_plugin_manager->getDefinitions() as $definition) {
        try {
          /** @var \Drupal\push_framework\ChannelPluginInterface $plugin */
          $plugin = $channel_plugin_manager->createInstance($definition['id']);
          if ($plugin->applicable($this->user())) {
            // TODO: Allow users to define their own preferences.
            $this->tasks[] = [
              'channel plugin id' => $plugin->getPluginId(),
              'attempt' => 0,
              'mute subsequent until completed' => TRUE,
              'skip subsequent on success' => TRUE,
            ];
          }
        } catch (PluginException $e) {
          // TODO: Log this exception.
        }
      }
    }
  }

  /**
   * @param \Drupal\push_framework\ChannelPluginManager $channel_plugin_manager
   *
   * @return bool
   */
  public function process(ChannelPluginManager $channel_plugin_manager): bool {
    if (!$this->initialized) {
      $this->getTasks($channel_plugin_manager);
      $this->initialized = TRUE;
    }

    $remainingTasks = [];
    $mute = FALSE;
    foreach ($this->tasks as $task) {
      try {
        /** @var \Drupal\push_framework\ChannelPluginInterface $channelPlugin */
        $channelPlugin = $channel_plugin_manager->createInstance($task['channel plugin id']);
      }
      catch (PluginException $e) {
        // TODO: Log this exception.
        continue;
      }
      if (!$mute) {
        // Use channel plugin and deliver message
        $task['attempt']++;
        if ($channelPlugin->isActive() && $entity = $this->plugin->getObjectAsEntity($this->oid)) {
          $content = $channelPlugin->prepareContent($this->user(), $entity);
          $result = $channelPlugin->send($this->user(), $entity, $content, $task['attempt']);
        }
        else {
          $result = ChannelBase::RESULT_STATUS_FAILED;
        }
        // Send feedback to the source plugin about the tasks and its result
        $this->plugin->confirmAttempt($this->oid, $this->user(), $channelPlugin, $result);

        $mute = $task['mute subsequent until completed'] ?? FALSE;
      }
      else {
        $result = ChannelPluginInterface::RESULT_STATUS_RETRY;
      }
      if ($result === ChannelPluginInterface::RESULT_STATUS_RETRY) {
        // Remember this task for a later retry
        $remainingTasks[] = $task;
      }
      elseif ($result === ChannelPluginInterface::RESULT_STATUS_SUCCESS) {
        if ($task['skip subsequent on success'] ?? FALSE) {
          break;
        }
      }
    }
    $this->tasks = $remainingTasks;

    if (empty($this->tasks)) {
      $this->plugin->confirmDelivery($this->oid, $this->user());
      return TRUE;
    }
    return FALSE;
  }

  /**
   * @param \Drupal\push_framework\SourcePluginManager $plugin_manager
   * @param array $payload
   *
   * @return \Drupal\push_framework\SourceItem
   * @throws \Drupal\Component\Plugin\Exception\PluginException
   */
  final public static function fromArray(SourcePluginManager $plugin_manager, array $payload): SourceItem {
    /** @var \Drupal\push_framework\SourcePluginInterface $plugin */
    $plugin = $plugin_manager->createInstance($payload['plugin id']);
    $item = new static($plugin, $payload['oid'], $payload['uid']);
    $item->initialized = $payload['initialized'];
    $item->tasks = $payload['tasks'];
    return $item;
  }

  /**
   * @return array
   */
  final public function toArray(): array {
    return [
      'oid' => $this->oid,
      'uid' => $this->uid,
      'plugin id' => $this->plugin->getPluginId(),
      'initialized' => $this->initialized,
      'tasks' => $this->tasks,
    ];
  }

}
