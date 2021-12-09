<?php

namespace Drupal\commerce_eta\Commands;

use Consolidation\OutputFormatters\StructuredData\RowsOfFields;
use Drupal\commerce_eta\Controller\EventDispatchController;
use Drupal\commerce_eta\Entity\Trigger;
use Drupal\Core\Session\AccountSwitcherInterface;
use Drupal\user\Entity\User;
use Drush\Commands\DrushCommands;

/**
 * A Drush commandfile.
 *
 * In addition to this file, you need a drush.services.yml
 * in root of your module, and a composer.json file that provides the name
 * of the services file to use.
 *
 * See these files for an example of injecting Drupal services:
 *   - http://cgit.drupalcode.org/devel/tree/src/Commands/DevelCommands.php
 *   - http://cgit.drupalcode.org/devel/tree/drush.services.yml
 */
class CommerceEtaCommands extends DrushCommands {

  /**
   * Account Switcher to work with config entities.
   *
   * @var \Drupal\Core\Session\AccountSwitcherInterface
   */
  protected $accountSwitcher;

  /**
   * CommerceEtaCommands constructor.
   *
   * @param \Drupal\Core\Session\AccountSwitcherInterface $account_switcher
   *   Account Switcher Interface definition.
   */
  public function __construct(AccountSwitcherInterface $account_switcher) {
    parent::__construct();
    $this->accountSwitcher = $account_switcher;
    // We are working with config entities, need privileges.
    $this->accountSwitcher->switchTo(User::load(1));
  }

  /**
   * Fire all enabled triggers.
   *
   * @usage commerce_eta:triggers:fire:all
   *   Fire all triggers.
   *
   * @command commerce_eta:triggers:fire:all
   */
  public function triggersFireAll() {
    $triggers = Trigger::loadMultiple();

    foreach ($triggers as $trigger) {
      $eventDispatchController = new EventDispatchController($trigger);

      $this->output->writeln('Firing ' . $trigger->label() . ' on ' . $eventDispatchController->getNextRunCount() . ' entities');

      $eventDispatchController->fire();
    }

    $this->accountSwitcher->switchBack();
  }

  /**
   * Command description here.
   *
   * @param string $trigger_id
   *   Trigger entity id.
   *
   * @usage commerce_eta:triggers:fire abandoned_carts
   *   Requires a trigger id to fire one trigger.
   *
   * @command commerce_eta:triggers:fire
   */
  public function triggersFireOne(string $trigger_id) {
    $trigger = Trigger::load($trigger_id);

    if ($trigger) {
      $eventDispatchController = new EventDispatchController($trigger);

      $this->output()->writeln('Firing ' . $trigger->label() . ' on ' . $eventDispatchController->getNextRunCount() . ' entities');

      $eventDispatchController->fire();
    }
    else {
      $this->yell('Oopsy whoopsy...that trigger does not exist. Try running "drush commerce_eta:triggers:list" to find out which triggers you can fire.');
    }
  }

  /**
   * List all triggers available to be fired.
   *
   * @field-labels
   *   trigger: Trigger
   *   target_entity: Target Entity
   *   cron_status: Cron Status
   *   next_run: Next Run
   *   status: Status
   *
   * @usage commerce_eta:triggers:list
   *   List all triggers.
   *
   * @default-fields trigger,target_entity,cron_status,next_run,status
   *
   * @command commerce_eta:triggers:list
   *
   * @filter-default-field trigger
   *
   * @return \Consolidation\OutputFormatters\StructuredData\RowsOfFields
   *   Returns an array of table rows.
   */
  public function listTriggers($options = ['format' => 'table']) {
    $triggers = Trigger::loadMultiple();

    $rows = [];

    foreach ($triggers as $trigger) {

      $dispatch_controller = new EventDispatchController($trigger);

      $rows[] = [
        'trigger' => $trigger->id(),
        'target_entity' => $trigger->getTargetEntityType(),
        'cron_status' => $trigger->getCronStatus() ? 'Enabled' : 'Disabled',
        'next_run' => $dispatch_controller->getNextRunCount(),
        'status' => ($trigger->getStatus() == TRUE) ? 'Enabled' : 'Disabled',
      ];
    }

    $this->accountSwitcher->switchBack();

    return new RowsOfFields($rows);
  }

}
