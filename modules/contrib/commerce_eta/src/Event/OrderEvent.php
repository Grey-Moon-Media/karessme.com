<?php

namespace Drupal\commerce_eta\Event;

use Drupal\commerce_eta\Entity\Trigger;
use Drupal\commerce_order\Entity\Order;
use Symfony\Component\EventDispatcher\Event;

/**
 * Event that is fired when a user logs in.
 */
class OrderEvent extends Event {

  const COMMERCE_ETA_ORDER = 'commerce_eta.order';

  /**
   * The Trigger entity that is firing this event.
   *
   * @var \Drupal\commerce_eta\Entity\Trigger
   */
  protected $trigger;

  /**
   * The Order entity this event is firing on.
   *
   * @var \Drupal\commerce_order\Entity\Order
   */
  protected $order;

  /**
   * The number of times this event has fired on this entity.
   *
   * @var null|int
   */
  protected $runCount;

  /**
   * Generates an OrderEvent object to fire with the dispatcher.
   *
   * @param \Drupal\commerce_eta\Entity\Trigger $trigger
   *   The Trigger entity that is firing this event.
   * @param \Drupal\commerce_order\Entity\Order $order
   *   The Order entity this event is firing on.
   * @param null|int $run_count
   *   The number of times this event has fired on this entity.
   */
  public function __construct(Trigger $trigger, Order $order, int $run_count = NULL) {
    $this->trigger = $trigger;
    $this->order = $order;

    if ($this->runCount) {
      $this->runCount = $run_count;
    }
  }

  /**
   * Helper function get the Order entity in the event.
   *
   * @return \Drupal\commerce_order\Entity\Order
   *   Commerce Order definition.
   */
  public function getOrder() {
    return $this->order;
  }

  /**
   * Helper function to get the Trigger entity that fired this event.
   *
   * @return \Drupal\commerce_eta\Entity\Trigger
   *   Event Trigger entity definition.
   */
  public function getTrigger() {
    return $this->trigger;
  }

  /**
   * Helper function to get the number of times this event has fired previously.
   *
   * @return int|null
   *   The number or null if event has never fired on the entity.
   */
  public function getRunCount() {
    return $this->runCount;
  }

}
