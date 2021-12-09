<?php

/**
 * Copyright (c) 2018 Palantir.net
 */

namespace Drupal\workbench_menu_access\Form;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Url;
use Drupal\system\MenuInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Configure Workbench menu access settings for a menu.
 */
class WorkbenchMenuAccessMenuForm extends ConfigFormBase {

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
    return 'workbench_menu_access_form';
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
  public function buildForm(array $form, FormStateInterface $form_state, $menu = NULL) {
    $entity = \Drupal::entityTypeManager()->getStorage('menu')->load($menu);
    if ($active = \Drupal::config('workbench_menu_access.settings')->get('access_scheme')) {
      if ($scheme = \Drupal::entityTypeManager()->getStorage('access_scheme')->load($active)) {
        $access_scheme = $scheme->getAccessScheme();
        $tree = $access_scheme->getTree();
        foreach($tree as $set) {
          foreach ($set as $id => $section) {
            $options[$id] = str_repeat('-', $section['depth']) . ' ' . $section['label'];
          }
        }
        $form['workbench_menu_access'] = [
          '#type' => 'select',
          '#multiple' => TRUE,
          '#title' => t('Workbench access section'),
          '#description' => t('Select the editorial group(s) that can update this menu. If no sections are selected, access will not be restricted.'),
          '#default_value' => $entity->getThirdPartySetting('workbench_menu_access', 'access_scheme'),
          '#options' => $options,
          '#weight' => 0,
          '#size' => (count($options) <= 10) ? count($options) : 10,
          '#access' => \Drupal::currentUser()->hasPermission('administer workbench menu access'),
        ];
        $form['menu'] = ['#type' => 'value', '#value' => $menu];
      }
      return parent::buildForm($form, $form_state);
    }
    else {
      $form['error'] = [
        '#markup' => $this->t('You must <a href="@url">configure an access scheme</a> to continue.',
          ['@url' => Url::fromRoute('workbench_menu_access.admin')->toString()]),
      ];
      return $form;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $menu = $form_state->getValue('menu');
    $entity = \Drupal::entityTypeManager()->getStorage('menu')->load($menu);
    $entity->setThirdPartySetting('workbench_menu_access', 'access_scheme', $form_state->getValue('workbench_menu_access'));
    $entity->save();
    parent::submitForm($form, $form_state);
  }

  /**
   * Route title callback.
   *
   * @param \Drupal\system\MenuInterface $menu
   *   The menu entity.
   *
   * @return array
   *   The menu label as a render array.
   */
  public function menuTitle($menu = NULL) {
    $entity = \Drupal::entityTypeManager()->getStorage('menu')->load($menu);
    return ['#markup' => $this->t('@label menu access settings', ['@label' => $entity->label()]), '#allowed_tags' => Xss::getHtmlTagList()];
  }

}
