<?php

namespace Drupal\commerce_eta\Plugin\Commerce\Condition;

use Drupal\commerce\Interval;
use Drupal\commerce\Plugin\Commerce\Condition\ConditionBase;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\commerce_order\Entity\Order;

/**
 * Provides condition for min and max order age.
 *
 * @CommerceCondition(
 *   id = "order_age",
 *   label = @Translation("Age"),
 *   category = @Translation("Order"),
 *   entity_type = "commerce_order",
 *   weight = 10,
 * )
 */
class OrderAge extends ConditionBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'minimum_age_basis' => NULL,
      'minimum_age_value' => NULL,
      'minimum_age_unit' => NULL,
      'limited' => NULL,
      'maximum_age_basis' => NULL,
      'maximum_age_value' => NULL,
      'maximum_age_unit' => NULL,
    ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);

    $form['age'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Minimum'),
    ];

    $intervalOptions = [
      'hour' => 'Hour(s)',
      'day' => 'Day(s)',
      'week' => 'Week(s)',
      'month' => 'Month(s)',
      'year' => 'Year(s)',
    ];

    $age_basis_options = [
      'created' => 'Created',
      'changed' => 'Changed',
      'placed' => 'Placed',
      'completed' => 'Completed',
    ];

    // MINIMUM.
    $form['age']['minimum_age_basis'] = [
      '#type' => 'select',
      '#title' => $this->t('Based on:'),
      '#options' => $age_basis_options,
      '#default_value' => $this->configuration['minimum_age_basis'],
    ];

    $form['age']['minimum_age_value'] = [
      '#type' => 'number',
      '#min' => 0,
      '#title' => $this->t('Age'),
      '#required' => TRUE,
      '#default_value' => $this->configuration['minimum_age_value'],
    ];

    $form['age']['minimum_age_unit'] = [
      '#type' => 'select',
      '#options' => $intervalOptions,
      '#required' => TRUE,
      '#default_value' => $this->configuration['minimum_age_unit'],
    ];

    $form['age']['limited'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Provide a maximum age?'),
      '#default_value' => $this->configuration['limited'],
      '#description' => $this->t('If you check this box, you MUST provide data below.'),
    ];

    // MAXIMUM.
    $form['age']['maximum'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Maximum'),
    ];
    $form['age']['maximum']['maximum_age_basis'] = [
      '#type' => 'select',
      '#title' => $this->t('Based on:'),
      '#options' => $age_basis_options,
      '#default_value' => $this->configuration['maximum_age_basis'],
    ];

    $form['age']['maximum']['maximum_age_value'] = [
      '#type' => 'number',
      '#min' => 0,
      '#title' => $this->t('Age'),
      '#required' => TRUE,
      '#default_value' => $this->configuration['maximum_age_value'],
    ];

    $form['age']['maximum']['maximum_age_unit'] = [
      '#type' => 'select',
      '#options' => $intervalOptions,
      '#required' => TRUE,
      '#default_value' => $this->configuration['maximum_age_unit'],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::submitConfigurationForm($form, $form_state);

    $values = $form_state->getValue($form['#parents']);

    $this->configuration['minimum_age_basis'] = $values['age']['minimum_age_basis'];
    $this->configuration['minimum_age_value'] = $values['age']['minimum_age_value'];
    $this->configuration['minimum_age_unit'] = $values['age']['minimum_age_unit'];

    if (!empty($values['age']['limited'])) {
      $this->configuration['limited'] = $values['age']['limited'];
      $this->configuration['maximum_age_basis'] = $values['age']['maximum']['maximum_age_basis'];
      $this->configuration['maximum_age_value'] = $values['age']['maximum']['maximum_age_value'];
      $this->configuration['maximum_age_unit'] = $values['age']['maximum']['maximum_age_unit'];
    }
    else {
      $this->configuration['limited'] = FALSE;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function evaluate(EntityInterface $entity) {

    $this->assertEntity($entity);
    /** @var \Drupal\commerce_order\Entity\Order $order */
    $order = $entity;

    $now = new DrupalDateTime('now');

    $minimum_interval = new Interval($this->configuration['minimum_age_value'], $this->configuration['minimum_age_unit']);

    $minimum_age = strtotime('-' . $minimum_interval->__toString(), $now->getTimestamp());

    $order_age_from_minimum = $this->getStartDate($order, $this->configuration['minimum_age_basis']);

    if ($order_age_from_minimum >= $minimum_age) {
      return FALSE;
    }

    if ($this->configuration['limited']) {
      $maximum_interval = new Interval($this->configuration['maximum_age_value'], $this->configuration['maximum_age_unit']);
      $maximum_age = strtotime('-' . $maximum_interval->__toString(), $now->getTimestamp());

      $order_age_from_maximum = $this->getStartDate($order, $this->configuration['maximum_age_basis']);
      if ($order_age_from_maximum <= $maximum_age) {
        return FALSE;
      }
    }

    return TRUE;
  }

  /**
   * Derives the start data for order aging.
   *
   * @param \Drupal\commerce_order\Entity\Order $order
   *   The Order entity to work off.
   * @param string $basis
   *   The the string value in which to get the start date.
   *
   * @return false|int
   *   Returns an epoch time int if $basis is valid.
   */
  private function getStartDate(Order $order, string $basis) {
    switch ($basis) {
      case 'created':
        $order_date = $order->getCreatedTime();
        break;

      case 'changed':
        $order_date = $order->getChangedTime();
        break;

      case 'placed':
        $order_date = $order->getPlacedTime();
        break;

      case 'completed':
        $order_date = $order->getCompletedTime();
        break;

      default:
        return FALSE;
    }

    return $order_date;
  }

}
