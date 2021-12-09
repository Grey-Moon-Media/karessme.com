<?php

namespace Drupal\commerce_eta\Plugin\Commerce\EntityTrait;

use Drupal\commerce\Plugin\Commerce\EntityTrait\EntityTraitBase;

/**
 * Order entity trait for Order Events.
 *
 * @CommerceEntityTrait(
 *  id = "order_events",
 *  label = @Translation("Enable order events"),
 *  entity_types = {"commerce_order"},
 * )
 */
class OrderEvents extends EntityTraitBase {

  /**
   * Gets orders.
   *
   * @return mixed
   *   The orders.
   */
  public function getOrders() {
    return $this->orders;
  }

}
