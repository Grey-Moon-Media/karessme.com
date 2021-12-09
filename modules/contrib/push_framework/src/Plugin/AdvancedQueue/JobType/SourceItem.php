<?php

namespace Drupal\push_framework\Plugin\AdvancedQueue\JobType;

use Drupal\advancedqueue\Job;
use Drupal\advancedqueue\JobResult;
use Drupal\advancedqueue\Plugin\AdvancedQueue\JobType\JobTypeBase;
use Drupal\Component\Plugin\Exception\PluginException;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\push_framework\ChannelPluginManager;
use Drupal\push_framework\SourceItem as SourceItemObject;
use Drupal\push_framework\SourcePluginManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides an AdvancedQueue JobType for publishing nodes.
 *
 * @AdvancedQueueJobType(
 *  id = "pf_sourceitem",
 *  label = @Translation("Push Framework SourceItem"),
 * )
 */
class SourceItem extends JobTypeBase implements ContainerFactoryPluginInterface {

  /**
   * @var \Drupal\push_framework\SourcePluginManager
   */
  protected $sourcePluginManager;

  /**
   * @var \Drupal\push_framework\ChannelPluginManager
   */
  protected $channelPluginManager;

  /**
   * @inheritDoc
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, SourcePluginManager $source_plugin_manager, ChannelPluginManager $channel_plugin_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->sourcePluginManager = $source_plugin_manager;
    $this->channelPluginManager = $channel_plugin_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('push_framework.source.plugin.manager'),
      $container->get('push_framework.channel.plugin.manager')
    );
  }

  /**
   * @param \Drupal\advancedqueue\Job $job
   *
   * @return \Drupal\advancedqueue\JobResult
   */
  public function process(Job $job): JobResult {
    $payload = $job->getPayload();
    if (is_array($payload)) {
      try {
        $item = SourceItemObject::fromArray($this->sourcePluginManager, $payload);
        if (!$item->process($this->channelPluginManager)) {
          $job->setPayload($item->toArray());
          return JobResult::failure('', 99, 300);
        }
      }
      catch (PluginException $e) {
        // TODO: Log this exception.
      }
    }
    return JobResult::success();
  }

}
