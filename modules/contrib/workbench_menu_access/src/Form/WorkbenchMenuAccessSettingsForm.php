<?php

/**
 * Copyright (c) 2018 Palantir.net
 */

namespace Drupal\workbench_menu_access\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Configure Workbench menu access settings for this site.
 */
class WorkbenchMenuAccessSettingsForm extends ConfigFormBase {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a WorkbenchMenuAccessSettingsForm object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'workbench_menu_access_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['workbench_menu_access.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('workbench_menu_access.settings');
    $schemes = $this->entityTypeManager->getStorage('access_scheme')->loadMultiple();
    if (empty($schemes)) {
      $form['error'] = [
        '#markup' => $this->t('You must create an access scheme to continue.'),
      ];
      return $form;
    }
    $options[] = t('Do not restrict menu access');
    foreach ($schemes as $scheme) {
      $options[$scheme->id()] = $scheme->label();
    }
    $form['access_scheme'] = [
      '#type' => 'select',
      '#title' => $this->t('Access scheme'),
      '#options' => $options,
      '#default_value' => $config->get('access_scheme'),
      '#description' => $this->t('Apply this access scheme to menu actions'),
    ];
    if ($active = $config->get('access_scheme')) {
      $scheme = $this->entityTypeManager->getStorage('access_scheme')->load($active);
      $form['info'] = [
        '#markup' => $this->t('The %type scheme %label is used for menu access.',
          ['%type' => $scheme->get('scheme'), '%label' => $scheme->label()]),
        '#prefix' => '<p>',
        '#suffix' => '</p>',
      ];
    }
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('workbench_menu_access.settings');
    $config->set('access_scheme', $form_state->getValue('access_scheme'))->save();
    parent::submitForm($form, $form_state);
  }

}
