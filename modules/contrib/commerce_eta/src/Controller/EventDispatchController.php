<?php

namespace Drupal\commerce_eta\Controller;

use Drupal\commerce_eta\Entity\Trigger;
use Drupal\commerce_eta\Event\OrderEvent;
use Drupal\commerce_eta\EventLogItem;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Entity\EntityInterface;
use Drupal\commerce_order\Entity\Order;

/**
 * Dispatches Commerce entity events for a Trigger.
 *
 * Toodoo: Replace this with a service.
 */
class EventDispatchController extends ControllerBase {

  /**
   * The event dispatcher service.
   *
   * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
   */
  protected $eventDispatcher;

  /**
   * Logger interface.
   *
   * @var \Psr\Log\LoggerInterface
   */
  protected $logger;

  /**
   * The trigger being fired.
   *
   * @var \Drupal\commerce_eta\Entity\Trigger
   */
  protected $trigger;

  /**
   * Drupal database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * The entity ids to fire events on.
   *
   * @var array
   */
  protected $entityIds = [];

  /**
   * The run count for this trigger and entity.
   *
   * @var int
   */
  protected $runCount;

  /**
   * EventDispatchController constructor.
   *
   * @param \Drupal\commerce_eta\Entity\Trigger $trigger
   *   The trigger to fire.
   */
  public function __construct(Trigger $trigger) {

    $this->trigger = $trigger;

    $this->eventDispatcher = \Drupal::service('event_dispatcher');

    $this->logger = \Drupal::logger('commerce_eta');

    $this->database = \Drupal::database();

    switch ($trigger->getTargetEntityType()) {
      case 'commerce_order':
        $query = \Drupal::entityQuery($this->trigger->getTargetEntityType());
        $order_ids = $query->execute();

        foreach ($order_ids as $order_id) {
          $order = Order::load($order_id);
          if ($trigger->applies($order)) {
            $this->entityIds[$order_id] = $order_id;
          }
        }

        break;

      // TOO DOO: ADD MORE COMMERCE ENTITIES HERE.
      default:
        return;
    }

    // Run the limiter to remove entities that should not run.
    if (!empty($this->trigger->getRunLimit())) {
      $this->runLimiter();
    }

  }

  /**
   * Removes entities from the run list if they have limited out.
   */
  private function runLimiter() {
    foreach ($this->entityIds as $entity_id) {
      if ($this->trigger->getRunLimit() <= $this->getRunCount($entity_id)) {
        unset($this->entityIds[$entity_id]);
      }
    }
  }

  /**
   * Fire.
   *
   * @return bool
   *   Returns TRUE if events have fired, FALSE if no events have fired.
   */
  public function fire() {
    if ($this->trigger->getStatus() && !empty($this->entityIds)) {
      switch ($this->trigger->getTargetEntityType()) {

        case 'commerce_order':

          foreach ($this->entityIds as $entity_id) {

            $order = Order::load($entity_id);
            // Log this event if logging is enabled for this trigger.
            if ($this->trigger->getLogStatus()) {
              $this->logger->info($this->trigger->label() . ' has attempted to fire an event for order ID ' . $order->id());
            }

            // Add the event to the DB as having fired.
            $this->dbInsertEvent($order);

            // Create and fire the event
            // Run count should be run again to reflect THIS event's run count.
            // So it needs to be run after the last DB insert.
            $event = new OrderEvent($this->trigger, $order, $this->getRunCount($order->id()));
            $response = $this->eventDispatcher->dispatch(OrderEvent::COMMERCE_ETA_ORDER, $event);
          }
          // Return a boolean stating that the events have fired.
          return TRUE;

        default:
          // Return a boolean stating that no events have fired.
          return FALSE;

      }

    }
    else {
      // Return a boolean stating that no events have fired.
      return FALSE;
    }

  }

  /**
   * Inserts a database row for an entity that was fired upon.
   *
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   The Commerce entity that the event was triggered on.
   *
   * @throws \Exception
   *   You've got bigger problems if this happens.
   */
  private function dbInsertEvent(EntityInterface $entity) {
    $now = new DrupalDateTime('now');

    $event_log_item = new EventLogItem($this->trigger->id(), $this->trigger->getTargetEntityType(), $entity->id(), $now->getTimestamp());

    $this->database->insert('commerce_eta_events')->fields($event_log_item->getQueryFieldData())->execute();
  }

  /**
   * Gets the amount of entities that will run on next job.
   *
   * @return string
   *   The number of entities.
   */
  public function getNextRunCount() {
    return (string) count($this->entityIds);
  }

  /**
   * Gets the number of times this trigger has fired on an entity.
   *
   * @param int $entity_id
   *   The Commerce entity id.
   *
   * @return int|void
   *   Returns the number or NULL if never run.
   */
  public function getRunCount(int $entity_id) {
    $query = $this->database->query("SELECT event_id, entity_id FROM commerce_eta_events WHERE entity_id = :entity_id AND entity_type = :entity_type", [
      ':entity_id' => $entity_id,
      ':entity_type' => $this->trigger->getTargetEntityType(),
    ]);
    $result = $query->fetchAll();
    return $this->runCount = count($result);
  }

}
