<?php

namespace Drupal\commerce_eta\Plugin\Commerce\Condition;

use Drupal\commerce\Plugin\Commerce\Condition\ConditionBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides condition for orders that are carts.
 *
 * @CommerceCondition(
 *   id = "order_cart_status",
 *   label = @Translation("Cart Status"),
 *   category = @Translation("Cart"),
 *   entity_type = "commerce_order",
 *   weight = 10,
 * )
 */
class OrderCartStatus extends ConditionBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'cart_status' => NULL,
    ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);

    $form['cart_status'] = [
      '#type' => 'radios',
      '#title' => $this->t('Cart Status'),
      '#default_value' => $this->configuration['cart_status'],
      '#options' => [
        TRUE => 'Shopping carts only',
        FALSE => 'No shopping carts',
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

    $this->configuration['cart_status'] = $values['cart_status'];

  }

  /**
   * {@inheritdoc}
   */
  public function evaluate(EntityInterface $entity) {

    $this->assertEntity($entity);
    /** @var \Drupal\commerce_order\Entity\Order $order */
    $order = $entity;

    $cart_status = $order->get('cart')->first()->getValue()['value'];

    if ((boolean) $cart_status == $this->configuration['cart_status']) {
      return TRUE;
    }

    return FALSE;
  }

}
