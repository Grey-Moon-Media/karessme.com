<?php

declare(strict_types=1);

namespace Drupal\commerce_promotion_giveaway;

use Drupal\commerce_order\Entity\OrderInterface;
use Drupal\commerce_order\OrderProcessorInterface;

/**
 * Cleans up the order items that were added by the giveaway promotions.
 */
class GiveawayPromotionOrderProcessor implements OrderProcessorInterface {

  /**
   * {@inheritdoc}
   */
  public function process(OrderInterface $order) {
    $giveaways = $order->getData('giveaways', []);
    // No giveaways to process.
    if (empty($giveaways)) {
      return;
    }

    foreach ($giveaways as $promotion_id => $data) {
      // This giveaway is no longer valid for this
      // order and needs to be removed.
      if (!$data['processed']) {
        unset($giveaways[$promotion_id]);
        foreach ($order->getItems() as $item) {
          if ($data['promotion'] === $item->getData('giveaway', FALSE)) {
            $order->removeItem($item);
          }
        }
      }
      else {
        // Set unprocessed, so that it is visible if the promotion applied again
        // on the next order refresh.
        $giveaways[$promotion_id]['processed'] = FALSE;
      }
    }

    foreach ($order->getItems() as $item) {
      // If the order refresh is running during order preSave(),
      // $order_item->getOrder() will point to the original order (or
      // NULL, in case the order item is new).
      $item->order_id->entity = $order;
    }

    $order->setData('giveaways', $giveaways);
  }

}
