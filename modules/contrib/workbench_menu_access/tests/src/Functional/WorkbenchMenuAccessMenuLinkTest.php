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
class WorkbenchMenuAccessMenuLinkTest extends BrowserTestBase {

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

  public function testMenuLinkPage() {
    $menu_name = 'main';

    $this->drupalLogin($this->admin);

    // Config check.
    $config = \Drupal::config('workbench_menu_access.settings');
    $active = $config->get('access_scheme');
    $this->assertEqual($active, '');

    // Check the settings.
    $menu = \Drupal::entityTypeManager()->getStorage('menu')->load('main');
    $this->assertEmpty($menu->getThirdPartySetting('workbench_menu_access', 'access_scheme'));

    // Add a menu link.
    $menu_link = $this->addMenuLink('My link', '', 'internal:/admin');
    $path_list[] = $menu_link_edit_path = '/admin/structure/menu/item/' . $menu_link->id() . '/edit';
    $path_list[] = $menu_link_delete_path = '/admin/structure/menu/item/' . $menu_link->id() . '/delete';

    // Access tests.
    $path_list[] = $path = "admin/structure/menu/manage/main/add";

    foreach ($path_list as $test) {
      $this->drupalLogout();
      $this->drupalGet($test);
      $this->assertResponse(403, 'Access denied to anon user.');

      $this->drupalLogin($this->editor);
      $this->drupalGet($test);
      $this->assertResponse(200, 'Access allowed to editor user.');

      $this->drupalLogin($this->admin);
      $this->drupalGet($test);
      $this->assertResponse(200, 'Access allowed to admin user.');
    }

    // Setup config.
    $scheme = $this->setUpTaxonomyScheme($this->node_type, $this->vocabulary);
    $config = \Drupal::configFactory()->getEditable('workbench_menu_access.settings');
    $config->set('access_scheme', 'editorial_section')->save();

    // Save the form.
    $menu_path = "admin/structure/menu/manage/main/access";
    $this->drupalGet($menu_path);
    $edit = ['workbench_access', 3];
    $this->submitForm(['workbench_menu_access[]' => $edit], 'Save');

    foreach ($path_list as $test) {
      $this->drupalLogout();
      $this->drupalGet($test);
      $this->assertResponse(403, 'Access denied to anon user.');

      $this->drupalLogin($this->editor);
      $this->drupalGet($test);
      $this->assertResponse(403, 'Access denied to editor user.');

      $this->drupalLogin($this->admin);
      $this->drupalGet($test);
      $this->assertResponse(200, 'Access allowed to admin user.');
    }

    // Add editor to section.
    $this->addUserToSection($scheme, $this->editor, [3]);

    foreach ($path_list as $test) {
      $this->drupalLogout();
      $this->drupalGet($test);
      $this->assertResponse(403, 'Access denied to anon user.');

      $this->drupalLogin($this->editor);
      $this->drupalGet($test);
      $this->assertResponse(200, 'Access allowed to editor user.');

      $this->drupalLogin($this->admin);
      $this->drupalGet($test);
      $this->assertResponse(200, 'Access allowed to admin user.');
    }

    // Test for subsection handling.
    // Save the form. Section 8 is a subsection of 3, so the editor should
    // still have access.
    $this->drupalLogin($this->admin);
    $this->drupalGet($menu_path);
    $edit = ['workbench_access', 8];
    $this->submitForm(['workbench_menu_access[]' => $edit], 'Save');

    // Editor can access the page.
    foreach ($path_list as $test) {
      $this->drupalLogout();
      $this->drupalGet($test);
      $this->assertResponse(403, 'Access denied to anon user.');

      $this->drupalLogin($this->editor);
      $this->drupalGet($test);
      $this->assertResponse(200, 'Access allowed to editor user.');

      $this->drupalLogin($this->admin);
      $this->drupalGet($test);
      $this->assertResponse(200, 'Access allowed to admin user.');
    }

  }
}
