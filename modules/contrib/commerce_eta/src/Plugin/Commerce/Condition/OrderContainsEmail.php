<?php

namespace Drupal\commerce_eta\Plugin\Commerce\Condition;

use Drupal\commerce\Plugin\Commerce\Condition\ConditionBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides condition for orders that contain an email address.
 *
 * @CommerceCondition(
 *   id = "order_contains_email",
 *   label = @Translation("Order Email"),
 *   category = @Translation("Customer"),
 *   entity_type = "commerce_order",
 *   weight = 10,
 * )
 */
class OrderContainsEmail extends ConditionBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'has_email' => NULL,
    ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);

    $form['has_email'] = [
      '#type' => 'radios',
      '#title' => $this->t('Cart Status'),
      '#default_value' => $this->configuration['has_email'],
      '#options' => [
        TRUE => 'Contains email address',
        FALSE => 'Order does not contain email address',
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

    $this->configuration['has_email'] = $values['has_email'];

  }

  /**
   * {@inheritdoc}
   */
  public function evaluate(EntityInterface $entity) {

    $this->assertEntity($entity);
    /** @var \Drupal\commerce_order\Entity\Order $order */
    $order = $entity;

    if (!empty($order->getEmail())) {
      return TRUE;
    }

    return FALSE;
  }

}
