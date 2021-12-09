<?php

namespace Drupal\commerce_eta\Entity;

use Drupal\commerce\ConditionGroup;
use Drupal\commerce\Plugin\Commerce\Condition\ParentEntityAwareInterface;
use Drupal\commerce_order\Entity\OrderInterface;
use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Trigger entity.
 *
 * @ConfigEntityType(
 *   id = "commerce_event_trigger",
 *   label = @Translation("Trigger"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\commerce_eta\TriggerListBuilder",
 *     "form" = {
 *       "add" = "Drupal\commerce_eta\Form\TriggerForm",
 *       "edit" = "Drupal\commerce_eta\Form\TriggerForm",
 *       "delete" = "Drupal\commerce_eta\Form\TriggerDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\commerce_eta\TriggerHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "commerce_event_trigger",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *     "cron_status" = "cron_status",
 *     "target_entity_type" = "target_entity_type",
 *     "conditions",
 *     "conditionOperator",
 *   },
 *   links = {
 *     "canonical" = "/admin/commerce/config/events/trigger/{commerce_event_trigger}",
 *     "add-form" = "/admin/commerce/config/events/trigger/add",
 *     "edit-form" = "/admin/commerce/config/events/trigger/{commerce_event_trigger}/edit",
 *     "delete-form" = "/admin/commerce/config/events/trigger/{commerce_event_trigger}/delete",
 *     "collection" = "/admin/commerce/config/events/triggers"
 *   }
 * )
 */
class Trigger extends ConfigEntityBase implements TriggerInterface {

  /**
   * The Trigger ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Trigger label.
   *
   * @var string
   */
  protected $label;

  /**
   * The status of cron for this trigger.
   *
   * @var bool
   */
  protected $cron_status;

  /**
   * The status of logging for this trigger.
   *
   * @var bool
   */
  protected $log_status;

  /**
   * The amount of times this trigger can run on any one entity.
   *
   * @var int
   */
  protected $run_limit;

  /**
   * The Commerce entity this trigger fires on.
   *
   * @var string
   */
  protected $target_entity_type;

  /**
   * The conditions.
   *
   * @var array
   */
  protected $conditions = [];

  /**
   * The condition operator.
   *
   * @var string
   */
  protected $conditionOperator = 'AND';

  /**
   * Gets the status of cron for this trigger.
   *
   * @return bool
   *   Returns TRUE if cron is enabled for this trigger.
   */
  public function getCronStatus() {
    return $this->cron_status;
  }

  /**
   * Enables this trigger to fire on cron.
   *
   * @param bool $status
   *   Set to TRUE to enable this trigger to run during cron.
   *
   * @return bool
   *   Returns TRUE if Cron is enabled for this trigger.
   */
  public function setCronStatus(bool $status) {
    return $this->cron_status = $status;
  }

  /**
   * Gets the status of logging for the trigger.
   *
   * @return bool
   *   Returns TRUE if logging is enabled.
   */
  public function getLogStatus() {
    return $this->log_status;
  }

  /**
   * Sets the state of logging for this trigger.
   *
   * @param bool $status
   *   Set to TRUE to enable logging on this trigger.
   *
   * @return bool
   *   Returns the status set in the method.
   */
  public function setLogStatus(bool $status) {
    return $this->log_status = $status;
  }

  /**
   * Gets the limit of how many times this trigger can run on any one entity.
   *
   * @return int
   *   The limit number.
   */
  public function getRunLimit() {
    return $this->run_limit;
  }

  /**
   * Sets the limit of how many times this trigger can fire on any one entity.
   *
   * @param int $limit
   *   The limit you want to set.
   *
   * @return int
   *   Returns the limit you set upon a valid method run.
   */
  public function setRunLimit(int $limit) {
    return $this->run_limit = $limit;
  }

  /**
   * The Commerce entity type id for this trigger.
   *
   * @return string
   *   Returns the entity type id as a string.
   */
  public function getTargetEntityType() {
    return $this->target_entity_type;
  }

  /**
   * Sets the target entity type for this trigger.
   *
   * @param \Drupal\Core\Config\Entity\ConfigEntityBase $entity_type
   *   The entity type object.
   *
   * @return string
   *   Returns the entity type id after setting it in the class.
   */
  public function setTargetEntityType(ConfigEntityBase $entity_type) {
    return $this->target_entity_type = $entity_type->id();
  }

  /**
   * Gets the Commerce Conditions of the Trigger.
   *
   * @return array
   *   The conditions array of the Trigger.
   */
  public function getConditions() {
    $plugin_manager = \Drupal::service('plugin.manager.commerce_condition');
    $conditions = [];
    foreach ($this->conditions as $condition) {
      $condition = $plugin_manager->createInstance($condition['plugin'], $condition['configuration']);
      if ($condition instanceof ParentEntityAwareInterface) {
        $condition->setParentEntity($this);
      }
      $conditions[] = $condition;
    }
    return $conditions;
  }

  /**
   * Gets the Trigger condition operator.
   *
   * @return string
   *   The condition operator. Possible values: AND, OR.
   */
  public function getConditionOperator() {
    return $this->conditionOperator;
  }

  /**
   * Sets the Trigger condition operator.
   *
   * @param string $condition_operator
   *   The condition operator.
   *
   * @return $this
   */
  public function setConditionOperator($condition_operator) {
    $this->conditionOperator = $condition_operator;
    return $this;
  }

  /**
   * Gets the published status of the Trigger entity.
   *
   * @return bool
   *   The published status of the Trigger.
   */
  public function getStatus() {
    return $this->status;
  }

  /**
   * Sets the Published status of the Trigger.
   *
   * @param bool $status
   *   The status you'd like the Trigger to be.
   *
   * @return bool
   *   The current status of the Trigger after method run.
   */
  public function setStatus($status) {
    return $this->status = $status;
  }

  /**
   * Gets the published status of the Trigger.
   *
   * @return bool
   *   Published status of the Trigger.
   */
  public function isPublished() {
    return $this->status;
  }

  /**
   * Checks whether the trigger applies to the given order.
   *
   * Ensures that the conditions pass.
   *
   * @param \Drupal\commerce_order\Entity\OrderInterface $order
   *   The order.
   *
   * @return bool
   *   TRUE if payment gateway applies, FALSE otherwise.
   */
  public function applies(OrderInterface $order) {
    $conditions = $this->getConditions();
    if (!$conditions) {
      // Payment gateways without conditions always apply.
      return TRUE;
    }
    $order_conditions = array_filter($conditions, function ($condition) {
      /** @var \Drupal\commerce\Plugin\Commerce\Condition\ConditionInterface $condition */
      return $condition->getEntityTypeId() == 'commerce_order';
    });
    $order_conditions = new ConditionGroup($order_conditions, $this->getConditionOperator());

    return $order_conditions->evaluate($order);
  }

}
