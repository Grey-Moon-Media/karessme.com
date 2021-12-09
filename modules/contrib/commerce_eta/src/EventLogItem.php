<?php

namespace Drupal\commerce_eta;

use Drupal\commerce_eta\Entity\Trigger;
use Drupal\Core\Datetime\DrupalDateTime;

/**
 * Event Log Item for saving / retrieving from the database.
 *
 * @package Drupal\commerce_eta
 */
class EventLogItem {

  /**
   * The Trigger entity ID.
   *
   * @var string
   */
  protected $triggerId;

  /**
   * The Commerce entity type.
   *
   * @var string
   */
  protected $targetEntityType;

  /**
   * The Entity ID this event worked on.
   *
   * @var int
   */
  protected $entityId;

  /**
   * Timestamp of the log item.
   *
   * @var int
   */
  protected $timestamp;

  /**
   * Event ID.
   *
   * @var int
   */
  protected $eventId;

  /**
   * EventLogItem constructor.
   *
   * @param string $trigger_id
   *   The entity ID of the trigger.
   * @param string $target_entity_type
   *   The entity type id of the target.
   * @param int $entity_id
   *   The entity id this event worked on.
   * @param int $timestamp
   *   Epoch time that this event fired.
   * @param null|int $event_id
   *   The event ID.
   */
  public function __construct(string $trigger_id, string $target_entity_type, int $entity_id, int $timestamp, int $event_id = NULL) {
    $this->triggerId = $trigger_id;
    $this->targetEntityType = $target_entity_type;
    $this->entityId = $entity_id;
    $this->timestamp = $timestamp;

    if ($event_id) {
      $this->eventId = $event_id;
    }
  }

  /**
   * Gets the Trigger entity for this log item.
   *
   * @return \Drupal\commerce_eta\Entity\Trigger|\Drupal\Core\Entity\EntityBase|\Drupal\Core\Entity\EntityInterface
   *   The Trigger entity.
   */
  public function getTrigger() {
    return Trigger::load($this->triggerId);
  }

  /**
   * Gets the entity this log item is about.
   *
   * @return \Drupal\Core\Entity\EntityInterface
   *   Returns one of the Commerce entity types that this module supports.
   */
  public function getTargetEntity() {
    return \Drupal::entityTypeManager()->getStorage($this->targetEntityType)->load($this->entityId);
  }

  /**
   * Gets the timestamp of the log item.
   *
   * @return \Drupal\Core\Datetime\DrupalDateTime
   *   DrupalDateTime definition.
   */
  public function getDrupalDateTime() {
    return DrupalDateTime::createFromTimestamp($this->timestamp);
  }

  /**
   * Gets the event id for this log item.
   *
   * @return int
   *   The ID of the event.
   */
  public function getEventId() {
    return $this->eventId;
  }

  /**
   * Gets the query field data.
   *
   * @return array
   *   Query data.
   */
  public function getQueryFieldData() {
    return [
      'trigger_id' => $this->triggerId,
      'entity_type' => $this->targetEntityType,
      'entity_id' => $this->entityId,
      'timestamp' => $this->timestamp,
    ];
  }

}
