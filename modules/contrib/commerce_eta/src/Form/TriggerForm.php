<?php

namespace Drupal\commerce_eta\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form to create and edit Trigger config entities.
 */
class TriggerForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    /**
     * @var \Drupal\commerce_eta\Entity\Trigger $trigger
     */
    $trigger = $this->entity;

    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $trigger->label(),
      '#description' => $this->t("Label for the Trigger."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $trigger->id(),
      '#machine_name' => [
        'exists' => '\Drupal\commerce_eta\Entity\Trigger::load',
      ],
      '#disabled' => !$trigger->isNew(),
    ];

    $form['status'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable Trigger'),
      '#description' => $this->t('Trigger will not fire events if disabled, although you can still see the next-run results on the triggers overview page'),
      '#default_value' => ($trigger->isNew()) ? FALSE : (boolean) $trigger->getStatus(),
    ];

    $form['cron_status'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Fire on cron run.'),
      '#default_value' => ($trigger->isNew()) ? NULL : (boolean) $trigger->getCronStatus(),
      '#description' => $this->t('When checked, this trigger will fire on each cron run. Depending on the size of your site (amount of entities, conditions, run limits, etc), this may have a large performance impact on your web workers during cron. For large sites, use the Drupal Console commands to pull triggers.'),
    ];

    $form['log_status'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Log events.'),
      '#default_value' => ($trigger->isNew()) ? NULL : (boolean) $trigger->getLogStatus(),
      '#description' => $this->t('When checked, all events fired by this trigger will be logged.'),
    ];

    $form['run_limit'] = [
      '#type' => 'number',
      '#title' => $this->t('Run limit'),
      '#description' => $this->t('The maximum times this trigger can fire an event on the same entity. Leave blank to disabled the limiter.'),
      '#default_value' => ($trigger->isNew()) ? NULL : (integer) $trigger->getRunLimit(),
    ];

    $form['target_entity_type'] = [
      '#type' => 'select',
      '#title' => $this->t('Commerce Entity Type'),
      '#default_value' => ($trigger->isNew()) ? NULL : (string) $trigger->getTargetEntityType(),
      '#size' => 1,
      '#required' => TRUE,
      '#options' => $this->getEntityTypeOptions(),
      '#ajax' => [
        'callback' => '::getEntityTypeConditionsForm',
        'wrapper' => 'entity-type-conditions',
        'event' => 'change',
      ],
    ];

    $form['entity_type_conditions'] = [
      '#type' => 'container',
      '#attributes' => [
        'id' => 'entity-type-conditions',
      ],
    ];

    if (!empty($trigger->getTargetEntityType())) {
      $entity_type = $trigger->getTargetEntityType();
    }
    else {
      $entity_type = $form_state->getValue('target_entity_type');
    }

    if (!empty($entity_type)) {

      switch ($entity_type) {
        case 'commerce_order':
          $form['entity_type_conditions']['conditions'] = [
            '#type' => 'commerce_conditions',
            '#title' => $this->t('Conditions'),
            '#parent_entity_type' => 'commerce_event_trigger',
            '#entity_types' => ['commerce_order'],
            '#default_value' => $this->entity->get('conditions'),
          ];

          break;
      }
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $trigger = $this->entity;
    $status = $trigger->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Trigger.', [
          '%label' => $trigger->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Trigger.', [
          '%label' => $trigger->label(),
        ]));
    }
    $form_state->setRedirectUrl($trigger->toUrl('collection'));
  }

  /**
   * Gets the conditions form for the selected entity type.
   *
   * @param array $form
   *   This form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   This forms state.
   *
   * @return array
   *   Returns the form array for the entity type conditions.
   */
  public function getEntityTypeConditionsForm(array $form, FormStateInterface $form_state) {
    return $form['entity_type_conditions'];
  }

  /**
   * Gets the entity types that triggers can run on.
   *
   * @return string[]
   *   The entity type ids.
   */
  private function getEntityTypeOptions() {
    return [
      'commerce_order' => 'Order',
      'commerce_shipment' => 'Shipment',
    // TOO DOO: Add other entity types here.
    ];
  }

}
