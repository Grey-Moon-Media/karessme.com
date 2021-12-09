<?php

namespace Drupal\push_framework\Plugin\DanseRecipientSelection;

use Drupal\Component\Plugin\Exception\PluginException;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\push_framework\ChannelBase;
use Drupal\push_framework\ChannelPluginManager;
use Drupal\danse\PayloadInterface;
use Drupal\danse\RecipientSelectionBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Plugin implementation of DANSE recipient selection.
 */
abstract class DirectPush extends RecipientSelectionBase implements DirectPushInterface {

  /**
   * @var \Drupal\push_framework\ChannelPluginManager
   */
  protected $channelPluginManager;

  /**
   * PluginBase constructor.
   *
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   * @param \Drupal\push_framework\ChannelPluginManager $channel_plugin_manager
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManagerInterface $entity_type_manager, ConfigFactoryInterface $config_factory, ChannelPluginManager $channel_plugin_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $entity_type_manager, $config_factory);
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
      $container->get('entity_type.manager'),
      $container->get('config.factory'),
      $container->get('push_framework.channel.plugin.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  final public function getRecipients(PayloadInterface $payload): array {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function push(PayloadInterface $payload): string {
    try {
      /** @var \Drupal\push_framework\ChannelPluginInterface $channel */
      $channel = $this->channelPluginManager->createInstance($this->directPushChannelId());
      /** @var \Drupal\user\UserInterface $user */
      $user = $this->entityTypeManager->getStorage('user')->load(1);
    }
    catch (PluginException $e) {
      // TODO: Log this exception.
      return ChannelBase::RESULT_STATUS_FAILED;
    }
    if ($channel->isActive()) {
      $entity = $payload->getEntity();
      $content = $channel->prepareContent($user, $entity);
      $result = $channel->send($user, $entity, $content, 0);
    }
    else {
      $result = ChannelBase::RESULT_STATUS_FAILED;
    }
    return $result;
  }

}
