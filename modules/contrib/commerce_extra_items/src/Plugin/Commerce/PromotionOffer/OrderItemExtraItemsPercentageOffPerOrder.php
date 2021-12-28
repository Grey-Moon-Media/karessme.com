<?php

namespace Drupal\commerce_extra_items\Plugin\Commerce\PromotionOffer;

use Drupal\commerce_order\PriceSplitterInterface;
use Drupal\commerce_price\RounderInterface;
use Drupal\commerce_promotion\Plugin\Commerce\PromotionOffer\OrderPromotionOfferBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\commerce_cart\Event\CartEvents;
use Drupal\commerce_cart\Event\CartEntityAddEvent;
use Drupal\commerce_order\Adjustment;
use Drupal\commerce_promotion\Entity\PromotionInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Provides an availability to offer extra items with discount for order.
 *
 * @CommercePromotionOffer(
 *   id = "order_extra_items_percentage_off",
 *   label = @Translation("Extra Items with Percentage Off (Per Order)"),
 *   entity_type = "commerce_order",
 * )
 */
class OrderItemExtraItemsPercentageOffPerOrder extends OrderPromotionOfferBase {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The event dispatcher.
   *
   * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
   */
  protected $eventDispatcher;

  /**
   * Constructs a new PromotionOfferBase object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The pluginId for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\commerce_price\RounderInterface $rounder
   *   The rounder.
   * @param \Drupal\commerce_order\PriceSplitterInterface $splitter
   *   The price splitter.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $event_dispatcher
   *   The event dispatcher.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, RounderInterface $rounder, PriceSplitterInterface $splitter, EntityTypeManagerInterface $entity_type_manager, EventDispatcherInterface $event_dispatcher) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $rounder, $splitter);
    $this->entityTypeManager = $entity_type_manager;
    $this->eventDispatcher = $event_dispatcher;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('commerce_price.rounder'),
      $container->get('commerce_order.price_splitter'),
      $container->get('entity_type.manager'),
      $container->get('event_dispatcher')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'quantity' => NULL,
      'purchasable_entity' => NULL,
      'percentage' => '0',
    ] + parent::defaultConfiguration();
  }

  /**
   * Gets the purchasable entity for the extra item.
   *
   * @return \Drupal\commerce\PurchasableEntityInterface|null
   *   The purchasable entity or NULL if none entity is configured.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function getExtraItemPurchasableEntity() {
    if ($this->configuration['purchasable_entity']) {
      $storage = $this->entityTypeManager->getStorage('commerce_product_variation');
      $entity = $storage->load($this->configuration['purchasable_entity']);
      /** @var \Drupal\commerce\PurchasableEntityInterface|null $entity */
      return $entity;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form += parent::buildConfigurationForm($form, $form_state);

    $purchasable_entity = $this->getExtraItemPurchasableEntity();

    $form['product'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Specify a product variation to offer'),
    ];
    $form['product']['purchasable_entity'] = [
      '#type' => 'entity_autocomplete',
      '#title' => $this->t('Select a product variation'),
      '#target_type' => 'commerce_product_variation',
      '#default_value' => $purchasable_entity,
    ];
    $form['quantity'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Specify a quantity of the product variation to offer'),
    ];
    $form['quantity']['quantity'] = [
      '#type' => 'number',
      '#title' => $this->t('Quantity of the offered product'),
      '#min' => 1,
      '#max' => 9999,
      '#step' => 1,
      '#default_value' => $this->configuration['quantity'],
    ];
    $form['percentage'] = [
      '#type' => 'commerce_number',
      '#title' => $this->t('Percentage discount for the offered extra item'),
      '#default_value' => $this->configuration['percentage'] * 100,
      '#maxlength' => 255,
      '#min' => 0,
      '#max' => 100,
      '#size' => 4,
      '#field_suffix' => $this->t('%'),
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateConfigurationForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValue($form['#parents']);
    if (empty($values['percentage'])) {
      $form_state->setError($form, $this->t('Percentage must be a positive number.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::submitConfigurationForm($form, $form_state);

    $values = $form_state->getValue($form['#parents']);

    $this->configuration['quantity'] = $values['quantity']['quantity'];
    $this->configuration['purchasable_entity'] = $values['product']['purchasable_entity'];
    $this->configuration['percentage'] = (string) ($values['percentage'] / 100);
  }

  /**
   * {@inheritdoc}
   */
  public function apply(EntityInterface $entity, PromotionInterface $promotion) {
    $this->assertEntity($entity);

    /** @var \Drupal\commerce_order\Entity\Order $entity */

    $purchasable_entity = $this->getExtraItemPurchasableEntity();

    if ($purchasable_entity) {
      $quantity = $this->configuration['quantity'];
      $percentage = (string) $this->configuration['percentage'];
      /** @var \Drupal\commerce_order\OrderItemStorageInterface $order_item_storage */
      $order_item_storage = $this->entityTypeManager->getStorage('commerce_order_item');

      $order_item = $order_item_storage->createFromPurchasableEntity($purchasable_entity, [
        'quantity' => $quantity,
        'type' => 'extra_item',
      ]);
      $order_item->setData('promotion_id', $promotion->id());

      $adjustment_amount = $purchasable_entity->getPrice()->multiply($percentage);
      $adjustment_amount = $this->rounder->round($adjustment_amount);

      $order_item->addAdjustment(new Adjustment([
        'type' => 'promotion',
        // @todo Change to label from UI when added in #2770731.
        'label' => t('Discount'),
        'amount' => $adjustment_amount->multiply('-' . $order_item->getQuantity()),
        'percentage' => $percentage,
        'source_id' => $promotion->id(),
      ]));

      $order = $entity;
      $order_item->save();
      $order->addItem($order_item);

      // Manually trigger CartEvents::CART_ENTITY_ADD.
      if ($purchased_entity = $order_item->getPurchasedEntity()) {
        $quantity = $order_item->getQuantity();
        $saved_order_item = $order_item;
        $event = new CartEntityAddEvent($order, $purchased_entity, $quantity, $saved_order_item);
        $this->eventDispatcher->dispatch(CartEvents::CART_ENTITY_ADD, $event);
      }

    }
  }

}
