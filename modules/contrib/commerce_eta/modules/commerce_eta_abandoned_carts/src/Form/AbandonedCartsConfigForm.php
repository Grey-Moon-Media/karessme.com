<?php

namespace Drupal\commerce_eta_abandoned_carts\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Entity\View;

/**
 * Configure Abandoned Carts Email Form.
 */
class AbandonedCartsConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'commerce_eta_abandoned_carts.abandonedcartsconfig',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'abandoned_carts_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('commerce_eta_abandoned_carts.abandoned_carts');

    $form['subject_line'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Subject Line'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('subject_line'),
      '#description' => $this->t('Leave blank if you would like the default subject line of "Your cart at @site_name is waiting for you..."', [
        '@site_name' => \Drupal::config('system.site')->get('name'),
      ]),
    ];
    $form['bcc_email'] = [
      '#type' => 'email',
      '#title' => $this->t('BCC Email'),
      '#description' => $this->t('Leave blank if you do not want to bcc abandoned cart emails.'),
      '#default_value' => $config->get('bcc_email'),
    ];
    $form['from_email'] = [
      '#type' => 'email',
      '#title' => $this->t('From Email'),
      '#description' => $this->t('Leave blank if you would like to use the site email address (@site_email_address).', [
        '@site_email_address' => \Drupal::config('system.site')->get('mail'),
      ]),
      '#default_value' => $config->get('from_email'),
    ];

    $form['order_view'] = [
      '#type' => 'select',
      '#title' => $this->t('Order View'),
      '#description' => $this->t('Choose a view to include in the twig template. Views must have a base table of "commerce_order" to be included here. You can use {{ order_view }} in your twig template to include it. Do not use a view with caching enabled or you will get the same result in ALL of your emails. This view MUST include the order ID as the first argument.'),
      '#options' => $this->getOrderViews(),
      '#default_value' => $config->get('order_view'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->configFactory()->getEditable('commerce_eta_abandoned_carts.abandoned_carts')
      ->set('subject_line', $form_state->getValue('subject_line'))
      ->set('bcc_email', $form_state->getValue('bcc_email'))
      ->set('from_email', $form_state->getValue('from_email'))
      ->set('order_view', $form_state->getValue('order_view'))
      ->save();
  }

  /**
   * Gets a list of views available to render in the email.
   *
   * @return array
   *   Array of views ids.
   */
  private function getOrderViews() {
    $options = [];
    $entity_query = \Drupal::entityQuery('view');
    $entity_query->condition('base_table', 'commerce_order');

    $order_views = $entity_query->execute();

    foreach ($order_views as $order_view) {
      $view = View::load($order_view);
      $options[$view->id()] = $view->label();
    }

    return $options;
  }

}
