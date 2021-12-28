<?php

declare(strict_types=1);

namespace Drupal\Tests\commerce_promotion_giveaway\Kernel;

use Drupal\commerce_order\Entity\Order;
use Drupal\commerce_order\Entity\OrderItem;
use Drupal\commerce_product\Entity\Product;
use Drupal\commerce_product\Entity\ProductType;
use Drupal\commerce_product\Entity\ProductVariation;
use Drupal\commerce_promotion\Entity\Coupon;
use Drupal\commerce_promotion\Entity\Promotion;
use Drupal\Tests\commerce\Kernel\CommerceKernelTestBase;

/**
 * Tests commerce_promotion_giveaway.
 *
 * @group commerce_promotion_giveaway
 */
class GiveawayPromotionTest extends CommerceKernelTestBase {

  /**
   * The test promotion.
   *
   * @var \Drupal\commerce_promotion\Entity\PromotionInterface
   */
  protected $promotion;

  /**
   * The test variations.
   *
   * @var \Drupal\commerce_product\Entity\ProductVariationInterface[]
   */
  protected $variation;

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = [
    'entity_reference_revisions',
    'profile',
    'state_machine',
    'commerce_order',
    'commerce_number_pattern',
    'path',
    'commerce_product',
    'commerce_promotion',
    'commerce_promotion_giveaway',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $this->installEntitySchema('profile');
    $this->installEntitySchema('commerce_order');
    $this->installEntitySchema('commerce_number_pattern');
    $this->installEntitySchema('commerce_order_type');
    $this->installEntitySchema('commerce_order_item');
    $this->installEntitySchema('commerce_promotion');
    $this->installEntitySchema('commerce_product_variation');
    $this->installEntitySchema('commerce_product');
    $this->installEntitySchema('commerce_promotion_coupon');

    $this->installConfig([
      'profile',
      'commerce_order',
      'commerce_product',
      'commerce_promotion',
    ]);
    $this->installSchema('commerce_promotion', ['commerce_promotion_usage']);

    $product_type = ProductType::create([
      'id' => 'test',
      'label' => 'Test',
      'variationType' => 'default',
    ]);
    $product_type->save();

    $this->variation = ProductVariation::create([
      'type' => 'default',
      'sku' => $this->randomMachineName(),
      'price' => [
        'number' => '10',
        'currency_code' => 'USD',
      ],
    ]);
    $this->variation->save();

    $giveaway = Product::create([
      'type' => 'test',
      'title' => $this->randomMachineName(),
      'stores' => [$this->store],
      'variations' => [$this->variation],
    ]);
    $giveaway->save();

    $this->promotion = Promotion::create([
      'name' => 'Promotion 1',
      'order_types' => ['default'],
      'stores' => [$this->store->id()],
      'offer' => [
        'target_plugin_id' => 'order_giveaway',
        'target_plugin_configuration' => [
          'giveaway' => $this->variation->id(),
          'quantity' => 1,
          'show_price' => TRUE,
        ],
      ],
      'status' => TRUE,
    ]);
    $this->promotion->save();

  }

  /**
   * Tests add a giveaway to an order via a promotional offer.
   */
  public function testGiveawayAddToOrder(): void {
    $order_item = OrderItem::create([
      'type' => 'default',
      'quantity' => 1,
      'unit_price' => [
        'number' => '20.00',
        'currency_code' => 'USD',
      ],
    ]);
    $order_item->save();

    $order = Order::create([
      'type' => 'default',
      'state' => 'draft',
      'mail' => 'test@example.com',
      'ip_address' => '127.0.0.1',
      'uid' => $this->createUser(),
      'store_id' => $this->store,
      'order_items' => [$order_item],
    ]);

    $order->save();

    self::assertCount(
      2,
      $order->getItems(),
      'The order got its giveaway added as an order item.'
    );

    self::assertCount(
      1,
      $order->collectAdjustments(),
      'The order got its giveaway added as an order item.'
    );

    self::assertEquals(
      -10,
      $order->collectAdjustments()[0]->getAmount()->getNumber(),
      'The correct adjustment was added.'
    );

    self::assertEquals(
      20,
      $order->getTotalPrice()->getNumber(),
      'The order total has not changed.');

    // Resave does not change anything.
    $order->save();

    self::assertCount(
      2,
      $order->getItems(),
      'The order got its giveaway added as an order item.'
    );

    self::assertCount(
      1,
      $order->collectAdjustments(),
      'The order got its giveaway added as an order item.'
    );

    self::assertEquals(
      -10,
      $order->collectAdjustments()[0]->getAmount()->getNumber(),
      'The correct adjustment was added.'
    );

    self::assertEquals(
      20,
      $order->getTotalPrice()->getNumber(),
      'The order total has not changed.');
  }

  /**
   * Tests add and remove a giveaway to an order via coupon.
   */
  public function testGiveawayAddAndRemoveByCoupons(): void {
    $coupon = Coupon::create([
      'code' => $this->randomString(),
      'status' => TRUE,
    ]);
    $coupon->save();
    $this->promotion->get('coupons')->appendItem($coupon);
    $this->promotion->save();

    $order_item = OrderItem::create([
      'type' => 'default',
      'quantity' => 1,
      'unit_price' => [
        'number' => '20.00',
        'currency_code' => 'USD',
      ],
    ]);
    $order_item->save();

    $order = Order::create([
      'type' => 'default',
      'state' => 'draft',
      'mail' => 'test@example.com',
      'ip_address' => '127.0.0.1',
      'uid' => $this->createUser(),
      'store_id' => $this->store,
      'order_items' => [$order_item],
    ]);

    $order->save();

    self::assertCount(
      1,
      $order->getItems(),
      'The order got its giveaway removed.'
    );

    self::assertCount(
      0,
      $order->collectAdjustments(),
      'The order got its giveaway adjustment removed.'
    );

    self::assertEquals(
      20,
      $order->getTotalPrice()->getNumber(),
      'The order total has not changed.');

    $order->get('coupons')->appendItem($coupon);

    $order->save();

    self::assertCount(
      2,
      $order->getItems(),
      'The order got its giveaway added as an order item.'
    );

    self::assertCount(
      1,
      $order->collectAdjustments(),
      'The order got its giveaway added as an order item.'
    );

    self::assertEquals(
      -10,
      $order->collectAdjustments()[0]->getAmount()->getNumber(),
      'The correct adjustment was added.'
    );

    self::assertEquals(
      20,
      $order->getTotalPrice()->getNumber(),
      'The order total has not changed.');

    $coupon_ids = array_column($order->get('coupons')->getValue(), 'target_id');
    $coupon_index = array_search($coupon->id(), $coupon_ids, TRUE);
    $order->get('coupons')->removeItem($coupon_index);

    $order->save();

    self::assertCount(
      1,
      $order->getItems(),
      'The order got its giveaway removed.'
    );

    self::assertCount(
      0,
      $order->collectAdjustments(),
      'The order got its giveaway removed.'
    );

    self::assertEquals(
      20,
      $order->getTotalPrice()->getNumber(),
      'The order total has not changed.');

  }

  /**
   * Tests add a giveaway to an order via promotion.
   */
  public function testGiveawayNoPrice(): void {
    $offer = $this->promotion->getOffer();
    $config = $offer->getConfiguration();
    $config['show_price'] = FALSE;
    $offer->setConfiguration($config);
    $this->promotion->setOffer($offer);
    $this->promotion->save();

    $order_item = OrderItem::create([
      'type' => 'default',
      'quantity' => 1,
      'unit_price' => [
        'number' => '20.00',
        'currency_code' => 'USD',
      ],
    ]);
    $order_item->save();

    $order = Order::create([
      'type' => 'default',
      'state' => 'draft',
      'mail' => 'test@example.com',
      'ip_address' => '127.0.0.1',
      'uid' => $this->createUser(),
      'store_id' => $this->store,
      'order_items' => [$order_item],
    ]);

    $order->save();

    self::assertCount(
      2,
      $order->getItems(),
      'The order got its giveaway added as an order item.'
    );

    self::assertCount(
      0,
      $order->collectAdjustments(),
      'The order got its giveaway added as an order item.'
    );

    self::assertEquals(
      20,
      $order->getTotalPrice()->getNumber(),
      'The order total has not changed.');
  }

  /**
   * Tests with multiple giveaway promotions.
   */
  public function testMultiplePromotions(): void {
    $order_item = OrderItem::create([
      'type' => 'default',
      'quantity' => 1,
      'unit_price' => [
        'number' => '20.00',
        'currency_code' => 'USD',
      ],
    ]);
    $order_item->save();

    $order = Order::create([
      'type' => 'default',
      'state' => 'draft',
      'mail' => 'test@example.com',
      'ip_address' => '127.0.0.1',
      'uid' => $this->createUser(),
      'store_id' => $this->store,
      'order_items' => [$order_item],
    ]);

    $promotion = Promotion::create([
      'name' => 'Promotion 2',
      'order_types' => ['default'],
      'stores' => [$this->store->id()],
      'offer' => [
        'target_plugin_id' => 'order_giveaway',
        'target_plugin_configuration' => [
          'giveaway' => $this->variation->id(),
          'quantity' => 2,
          'show_price' => FALSE,
        ],
      ],
      'status' => TRUE,
    ]);
    $promotion->save();

    $order->save();

    self::assertCount(
      3,
      $order->getItems(),
      'The order got its giveaway added as an order item.'
    );

    self::assertCount(
      1,
      $order->collectAdjustments(),
      'The order got its giveaway added as an order item.'
    );

    self::assertEquals(
      -10,
      $order->collectAdjustments()[0]->getAmount()->getNumber(),
      'The correct adjustment was added.'
    );

    self::assertEquals(
      20,
      $order->getTotalPrice()->getNumber(),
      'The order total has not changed.');

    $promotion->delete();

    $order->save();

    self::assertCount(
      2,
      $order->getItems(),
      'The order got its giveaway added as an order item.'
    );

    self::assertCount(
      1,
      $order->collectAdjustments(),
      'The order got its giveaway added as an order item.'
    );

    self::assertEquals(
      -10,
      $order->collectAdjustments()[0]->getAmount()->getNumber(),
      'The correct adjustment was added.'
    );

    self::assertEquals(
      20,
      $order->getTotalPrice()->getNumber(),
      'The order total has not changed.');
  }

  /**
   * Tests behavior when a user removes an order item manually.
   *
   * The giveaway must not get added again automatically.
   */
  public function testGiveawayRemoveOrderItem(): void {
    $order_item = OrderItem::create([
      'type' => 'default',
      'quantity' => 1,
      'unit_price' => [
        'number' => '20.00',
        'currency_code' => 'USD',
      ],
    ]);
    $order_item->save();

    $order = Order::create([
      'type' => 'default',
      'state' => 'draft',
      'mail' => 'test@example.com',
      'ip_address' => '127.0.0.1',
      'uid' => $this->createUser(),
      'store_id' => $this->store,
      'order_items' => [$order_item],
    ]);

    $order->save();
    $giveaway = $order->getItems()[1];
    $order->removeItem($giveaway);
    $order->save();

    self::assertCount(
      1,
      $order->getItems(),
      'The order got its giveaway removed.'
    );

    self::assertCount(
      0,
      $order->collectAdjustments(),
      'The order got its giveaway adjustment removed.'
    );

    self::assertEquals(
      20,
      $order->getTotalPrice()->getNumber(),
      'The order total has not changed.');
  }

}
