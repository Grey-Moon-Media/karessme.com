<?php

declare(strict_types=1);

namespace Drupal\commerce_promotion_giveaway\Plugin\Commerce\PromotionOffer;

use Drupal\commerce\Context;
use Drupal\commerce_order\Adjustment;
use Drupal\commerce_order\PriceSplitterInterface;
use Drupal\commerce_price\Resolver\ChainPriceResolverInterface;
use Drupal\commerce_price\RounderInterface;
use Drupal\commerce_promotion\Entity\PromotionInterface;
use Drupal\commerce_promotion\Plugin\Commerce\PromotionOffer\OrderPromotionOfferBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a giveaway promotion offer.
 *
 * Get any Product for free, given the configured commerce conditions.
 *
 * @CommercePromotionOffer(
 *   id = "order_giveaway",
 *   label = @Translation("Giveaway"),
 *   entity_type = "commerce_order",
 * )
 */
class Giveaway extends OrderPromotionOfferBase {

  /**
   * The Order item storage.
   *
   * @var \Drupal\commerce_order\OrderItemStorageInterface
   */
  protected $orderItemStorage;

  /**
   * Product variation storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  private $variationStorage;

  /**
   * The chain price resolver.
   *
   * @var \Drupal\commerce_price\Resolver\ChainPriceResolverInterface
   */
  protected $chainPriceResolver;

  /**
   * Constructs a new BuyXGetY object.
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
   *   The splitter.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The entity type manager.
   * @param \Drupal\commerce_price\Resolver\ChainPriceResolverInterface $chain_price_resolver
   *   The chain price resolver.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    RounderInterface $rounder,
    PriceSplitterInterface $splitter,
    EntityTypeManagerInterface $entityTypeManager,
    ChainPriceResolverInterface $chain_price_resolver
  ) {
    parent::__construct(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $rounder,
      $splitter
    );

    $this->orderItemStorage = $entityTypeManager->getStorage('commerce_order_item');
    $this->variationStorage = $entityTypeManager->getStorage('commerce_product_variation');
    $this->chainPriceResolver = $chain_price_resolver;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(
    ContainerInterface $container,
    array $configuration,
    $plugin_id,
    $plugin_definition
  ) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('commerce_price.rounder'),
      $container->get('commerce_order.price_splitter'),
      $container->get('entity_type.manager'),
      $container->get('commerce_price.chain_price_resolver')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'giveaway' => NULL,
      'quantity' => 1,
      'show_price' => FALSE,
    ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form += parent::buildConfigurationForm($form, $form_state);

    $variation = NULL;
    if (!empty($this->configuration['giveaway'])) {
      $variation = $this->variationStorage->load($this->configuration['giveaway']);
    }

    $form['giveaway'] = [
      '#type' => 'entity_autocomplete',
      '#title' => $this->t('Giveaway'),
      '#default_value' => $variation,
      '#target_type' => 'commerce_product_variation',
      '#tags' => FALSE,
      '#required' => TRUE,
      '#maxlength' => NULL,
    ];

    $form['quantity'] = [
      '#type' => 'commerce_number',
      '#title' => $this->t('Quantity'),
      '#default_value' => $this->configuration['quantity'],
      '#required' => TRUE,
    ];

    $form['show_price'] = [
      '#type' => 'radios',
      '#title' => $this->t('Show price'),
      '#default_value' => $this->configuration['show_price'],
      '#required' => TRUE,
      '#title_display' => 'invisible',
      '#options' => [
        FALSE => $this->t('Override order item price with 0 and do not show any adjustments.'),
        TRUE => $this->t('Show the list price and subtract it as an order adjustment.'),
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::submitConfigurationForm($form, $form_state);

    if (!$form_state->getErrors()) {
      $values = $form_state->getValue($form['#parents']);
      $this->configuration['giveaway'] = $values['giveaway'];
      $this->configuration['quantity'] = $values['quantity'];
      $this->configuration['show_price'] = $values['show_price'];
    }
  }

  /**
   * {@inheritdoc}
   */
  public function apply(EntityInterface $order, PromotionInterface $promotion) {
    /** @var \Drupal\commerce_order\Entity\OrderInterface $order */
    $this->assertEntity($order);
    $order_item = NULL;

    $giveaways = $order->getData('giveaways', []);
    if (empty($giveaways[$promotion->id()])) {
      $giveaways[$promotion->id()] = [
        'promotion' => $promotion->id(),
      ];

      // Because the order items were just refreshed, all properties need to be
      // set manually for the new order item.
      $time = (int) $order->getCalculationDate()->format('U');
      $context = new Context($order->getCustomer(), $order->getStore(), $time);

      /** @var \Drupal\commerce_product\Entity\ProductVariationInterface $variation */
      $variation = $this->variationStorage->load($this->configuration['giveaway']);

      $order_item = $this->orderItemStorage->createFromPurchasableEntity($variation, [
        'quantity' => $this->configuration['quantity'],
      ]);

      $unit_price = $this->chainPriceResolver->resolve($variation, $order_item->getQuantity(), $context);

      // Should the price be visible for the user.
      if (!$this->configuration['show_price']) {
        $unit_price = $unit_price->multiply((string) 0);
      }

      // Setting the price, if price was set to 0 the overridden tag gets set.
      $order_item->setUnitPrice($unit_price, !$this->configuration['show_price']);

      // Assuming a promotion can only be applied once.
      $order_item->setData('giveaway', $promotion->id());
      $order_item->save();
      $order->addItem($order_item);
    }
    else {
      foreach ($order->getItems() as $item) {
        if ($promotion->id() === $item->getData('giveaway', FALSE)) {
          $order_item = $item;
          break;
        }
      }
    }

    $giveaways[$promotion->id()]['processed'] = TRUE;
    $order->setData('giveaways', $giveaways);

    // Giveaway manually removed, no adjustment should get applied.
    if ($order_item === NULL) {
      return;
    }

    // Should the price be visible for the user.
    if ($this->configuration['show_price']) {
      $order->addAdjustment(new Adjustment([
        'type' => 'promotion',
        // @todo Change to label from UI when added in #2770731.
        'label' => $this->t('Giveaway'),
        'amount' => $order_item->getTotalPrice()->multiply('-1'),
        'source_id' => $promotion->id(),
      ]));
    }

  }

}
