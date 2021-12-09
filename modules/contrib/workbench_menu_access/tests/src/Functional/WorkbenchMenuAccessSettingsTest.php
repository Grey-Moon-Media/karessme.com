<?php

/**
 * Copyright (c) 2018 Palantir.net
 */

namespace Drupal\Tests\workbench_menu_access\Functional;

use Drupal\Tests\BrowserTestBase;
use Drupal\Tests\workbench_menu_access\Traits\WorkbenchMenuAccessTestTrait;

/**
 * Settings tests for the module.
 *
 * @group workbench_menu_access
 */
class WorkbenchMenuAccessSettingsTest extends BrowserTestBase {

  use WorkbenchMenuAccessTestTrait;

  /**
   * The default theme.
   *
   * @var string
   */
  protected $defaultTheme = 'stable';

  /**
   * Admin user.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $admin;

  /**
   * Editorial user.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $editor;

  /**
   * Vocabulary.
   *
   * @var \Drupal\taxonomy\VocabularyInterface
   */
  protected $vocabulary;

  /**
   * Vocabulary.
   *
   * @var \Drupal\node\NodeTypeInterface
   */
  protected $node_type;

  /**
   * {@inheritdoc}
   */
  public static $modules = [
    'workbench_access',
    'workbench_menu_access',
    'node',
    'taxonomy',
    'options',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->node_type = $this->createContentType(['type' => 'page']);
    $this->vocabulary = $this->setUpVocabulary();
    $this->setUpTaxonomyFieldForEntityType('node', 'page', $this->vocabulary->id());
    $this->admin = $this->setUpAdminUser(['bypass workbench access', 'administer workbench menu access']);
    $this->editor = $this->setUpEditorUser();

  }

  public function testSettingsPage() {
    // Config check.
    $config = \Drupal::config('workbench_menu_access.settings');
    $active = $config->get('access_scheme');
    $this->assertEqual($active, '');

    // Access tests.
    $path = '/admin/config/workflow/workbench_access/menu_settings';
    $this->drupalGet($path);
    $this->assertResponse(403, 'Access denied to anon user.');
    $this->drupalLogin($this->editor);
    $this->drupalGet($path);
    $this->assertResponse(403, 'Access denied to editor user.');
    $this->drupalLogin($this->admin);
    $this->drupalGet($path);
    $this->assertResponse(200, 'Access allowed to admin user.');

    // Form tests.
    $this->assertText('You must create an access scheme to continue.');

    $this->setUpTaxonomyScheme($this->node_type, $this->vocabulary);
    $this->drupalGet($path);
    $this->assertNoText('You must create an access scheme to continue.');

    $web_assert = $this->assertSession();
    $web_assert->optionExists('access_scheme', 'Editorial section');
    $this->submitForm(['access_scheme' => 'editorial_section'], 'Save');
    $option_field = $web_assert->optionExists('access_scheme', 'Editorial section');
    $this->assertTrue($option_field->hasAttribute('selected'), 'Item selected');

    $this->assertText('The taxonomy scheme Editorial section is used for menu access.');

    // Config check.
    $config = \Drupal::config('workbench_menu_access.settings');
    $active = $config->get('access_scheme');
    $this->assertEqual($active, 'editorial_section');
  }
}
