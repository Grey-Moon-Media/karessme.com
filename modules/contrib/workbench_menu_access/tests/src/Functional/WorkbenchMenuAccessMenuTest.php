<?php

/**
 * Copyright (c) 2018 Palantir.net
 */

namespace Drupal\Tests\workbench_menu_access\Functional;

use Drupal\Tests\BrowserTestBase;
use Drupal\Tests\workbench_menu_access\Traits\WorkbenchMenuAccessTestTrait;

/**
 * Menu form tests for the module.
 *
 * @group workbench_menu_access
 */
class WorkbenchMenuAccessMenuTest extends BrowserTestBase {

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
    'menu_link_content',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->node_type = $this->createContentType(['type' => 'page']);
    $this->vocabulary = $this->setUpVocabulary();
    $this->setUpTaxonomyFieldForEntityType('node', 'page', $this->vocabulary->id());
    $this->admin = $this->setUpAdminUser(['bypass workbench access', 'administer workbench menu access', 'administer menu']);
    $this->editor = $this->setUpEditorUser();
    $this->createTerms($this->vocabulary);

  }

  public function testMenuPage() {
    // Config check.
    $config = \Drupal::config('workbench_menu_access.settings');
    $active = $config->get('access_scheme');
    $this->assertEqual($active, '');

    // Check the settings.
    $menu = \Drupal::entityTypeManager()->getStorage('menu')->load('main');
    $this->assertEmpty($menu->getThirdPartySetting('workbench_menu_access', 'access_scheme'));

    // Access tests.
    $path = '/admin/structure/menu/manage/main';
    $access_path = '/admin/structure/menu/manage/main/access';
    $this->drupalGet($path);
    $this->assertResponse(403, 'Access denied to anon user.');
    $this->drupalGet($access_path);
    $this->assertResponse(403, 'Access denied to anon user.');

    $this->drupalLogin($this->editor);
    $this->drupalGet($path);
    $web_assert = $this->assertSession();
    $this->assertResponse(200, 'Access allowed to editor user.');
    $this->drupalGet($access_path);
    $this->assertResponse(403, 'Access denied to editor user.');

    $this->drupalLogin($this->admin);
    $this->drupalGet($path);
    $this->assertResponse(200, 'Access allowed to admin user.');
    $web_assert->fieldNotExists('workbench_menu_access[]');
    $this->drupalGet($access_path);
    $this->assertResponse(200, 'Access allowed to admin user.');
    $web_assert->pageTextContains('You must configure an access scheme to continue.');

    // Setup config.
    $scheme = $this->setUpTaxonomyScheme($this->node_type, $this->vocabulary);
    $config = \Drupal::configFactory()->getEditable('workbench_menu_access.settings');
    $config->set('access_scheme', 'editorial_section')->save();

    // Admin can access the form.
    $this->drupalLogin($this->admin);
    $this->drupalGet($access_path);
    $this->assertResponse(200, 'Access allowed to admin user.');
    $web_assert->fieldExists('workbench_menu_access[]');

    // Save the form.
    $edit = ['workbench_access', 3];
    $this->submitForm(['workbench_menu_access[]' => $edit], 'Save');

    // Check the settings.
    $menu = \Drupal::entityTypeManager()->getStorage('menu')->load('main');
    $this->assertEqual(array_values($menu->getThirdPartySetting('workbench_menu_access', 'access_scheme')), $edit);

    // Editor can no longer access page.
    $this->drupalLogin($this->editor);
    $this->drupalGet($access_path);
    $this->assertResponse(403, 'Access denied to editor user.');

    // Editor can access the menu page but not the access form.
    $this->addUserToSection($scheme, $this->editor, [3]);
    $this->drupalLogin($this->editor);
    $this->drupalGet($path);
    $this->assertResponse(200, 'Access allowed to editor user.');

    // Admin can access the form.
    $this->drupalLogin($this->admin);
    $this->drupalGet($access_path);
    $this->assertResponse(200, 'Access allowed to admin user.');
    $web_assert->fieldExists('workbench_menu_access[]');

    // Test for subsection handling.
    // Save the form. Section 8 is a subsection of 3, so the editor should
    // still have access.
    $edit = ['workbench_access', 8];
    $this->submitForm(['workbench_menu_access[]' => $edit], 'Save');

    // Editor can access the page but not the form.
    $this->drupalLogin($this->editor);
    $this->drupalGet($path);
    $this->assertResponse(200, 'Access allowed to editor user.');

  }

}
