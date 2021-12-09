<?php

namespace Drupal\commerce_eta\Plugin\Commerce\Condition;

use Drupal\commerce\Plugin\Commerce\Condition\ConditionBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a condition for orders that contain at least one item.
 *
 * @CommerceCondition(
 *   id = "order_contains_items",
 *   label = @Translation("Order Items"),
 *   category = @Translation("Order"),
 *   entity_type = "commerce_order",
 *   weight = 10,
 * )
 */
class OrderContainsItems extends ConditionBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'has_items' => NULL,
    ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);

    $form['has_items'] = [
      '#type' => 'radios',
      '#title' => $this->t('Cart Status'),
      '#default_value' => $this->configuration['has_items'],
      '#options' => [
        TRUE => 'Contains at least one item',
        FALSE => 'Contains no items',
      ],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::submitConfigurationForm($form, $form_state);

    $values = $form_state->getValue($form['#parents']);

    $this->configuration['has_items'] = $values['has_items'];

  }

  /**
   * {@inheritdoc}
   */
  public function evaluate(EntityInterface $entity) {

    $this->assertEntity($entity);
    /** @var \Drupal\commerce_order\Entity\Order $order */
    $order = $entity;

    if ($order->hasItems()) {
      return TRUE;
    }

    return FALSE;
  }

}
