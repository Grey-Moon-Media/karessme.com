<?php

namespace Drupal\push_framework;

use Drupal\Component\Plugin\PluginBase;
use Drupal\Component\Render\PlainTextOutput;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Logger\LoggerChannelInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Render\Markup;
use Drupal\Core\Render\RendererInterface;
use Drupal\Core\Utility\Token;
use Drupal\user\UserInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Base class for push_framework plugins.
 */
abstract class ChannelBase extends PluginBase implements ChannelPluginInterface, ContainerFactoryPluginInterface {

  /**
   * @var bool
   */
  protected $active;

  /**
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * @var \Drupal\Core\Logger\LoggerChannelInterface
   */
  protected $logger;

  /**
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * @var \Drupal\Core\Utility\Token
   */
  protected $token;

  /**
   * @var \Drupal\Core\Config\ImmutableConfig
   */
  protected $defaultConfig;

  /**
   * @var \Drupal\Core\Config\ImmutableConfig
   */
  protected $pluginConfig;

  /**
   * PluginBase constructor.
   *
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   * @param \Drupal\Core\Logger\LoggerChannelInterface $logger
   * @param \Drupal\Core\Render\RendererInterface $renderer
   * @param \Drupal\Core\Utility\Token $token
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ConfigFactoryInterface $config_factory, EntityTypeManagerInterface $entity_type_manager, LoggerChannelInterface $logger, RendererInterface $renderer, Token $token) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entityTypeManager = $entity_type_manager;
    $this->configFactory = $config_factory;
    $this->logger = $logger;
    $this->renderer = $renderer;
    $this->token = $token;

    $this->defaultConfig = $this->configFactory->get('push_framework.settings');
    $this->pluginConfig = $this->configFactory->get($this->getConfigName());
    $this->active = (bool) $this->pluginConfig->get('active');
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('config.factory'),
      $container->get('entity_type.manager'),
      $container->get('logger.channel.push_framework'),
      $container->get('renderer'),
      $container->get('token')
    );
  }

  /**
   * {@inheritdoc}
   */
  final public function isActive(): bool {
    return $this->active;
  }

  /**
   * {@inheritdoc}
   */
  public function label(): string {
    // Cast the label to a string since it is a TranslatableMarkup object.
    return (string) $this->pluginDefinition['label'];
  }

  private function getConfigValue($key, $default) {
    $value = $this->pluginConfig->get($key);
    if ($this->pluginConfig->get('use_default_settings') || empty($value)) {
      $value = $this->defaultConfig->get($key);
      if (empty($value)) {
        $value = $default;
      }
    }
    return $value;
  }

  /**
   * {@inheritdoc}
   */
  final public function prepareContent(UserInterface $user, ContentEntityInterface $entity): array {
    $mode = $this->getConfigValue('display_modes.' . $entity->getEntityTypeId(), 'teaser');
    $subjectPattern = $this->getConfigValue('pattern.subject', '[push-object:label]');
    $bodyPattern = $this->getConfigValue('pattern.body.value', '[push-object:content]');
    $bodyFormat = $this->getConfigValue('pattern.body.format', 'plain_text');
    $isHtml = $bodyFormat !== 'plain_text';

    $viewBuilder = $this->entityTypeManager->getViewBuilder($entity->getEntityTypeId());
    $pushObject = ['label' => $entity->label()];
    $content = [];
    foreach ($entity->getTranslationLanguages() as $key => $langauge) {
      $elements = $viewBuilder->view($entity, $mode, $key);
      $output = $this->renderer->renderPlain($elements);
      if (!$isHtml) {
        $output = trim(PlainTextOutput::renderFromHtml($output));
        $count = 1;
        while ($count > 0) {
          $output = str_replace(["\n ", "\n\n"], "\n", $output, $count);
        }
        // Strip first line
        $output = trim(substr($output, strpos($output, "\n")));
      }
      $pushObject['content'] = $output;
      $content[$key] = [
        'subject' => $this->token->replace($subjectPattern, [
          'user' => $user,
          'push-object' => $pushObject,
        ], ['clear' => TRUE]),
        'body' => $this->token->replace($bodyPattern, [
          'user' => $user,
          'push-object' => $pushObject,
        ], ['clear' => TRUE]),
        'is html' => $isHtml,
      ];
      if ($isHtml) {
        $content[$key]['body'] = Markup::create($content[$key]['body']);
      }
    }
    return $content;
  }

}
