<?php

namespace Drupal\commerce_eta\Command;

use Drupal\commerce_eta\Controller\EventDispatchController;
use Drupal\commerce_eta\Entity\Trigger;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Drupal\Console\Core\Command\ContainerAwareCommand;
use Drupal\user\Entity\User;

/**
 * Class ListTriggersCommand.
 *
 * Drupal\Console\Annotations\DrupalCommand (
 *     extension="commerce_eta",
 *     extensionType="module"
 * )
 */
class ListTriggersCommand extends ContainerAwareCommand {

  /**
   * {@inheritdoc}
   */
  protected function configure() {
    $this
      ->setName('commerce_eta:list_triggers')
      ->setDescription($this->trans('Lists all triggers available to pull.'));
  }

  /**
   * {@inheritdoc}
   */
  protected function execute(InputInterface $input, OutputInterface $output) {
    $accountSwitcher = \Drupal::service('account_switcher');
    $account = User::load(1);
    $accountSwitcher->switchTo($account);

    $triggers = Trigger::loadMultiple();

    if ($triggers) {
      $this->showTriggersList($triggers);
    }

    $accountSwitcher->switchBack();

    $this->getIo()->info($this->trans('commands.commerce_eta.list_triggers.messages.how-to'));
  }

  /**
   * Shows all triggers available to be fired.
   *
   * @param \Drupal\commerce_eta\Entity\Trigger[] $triggers
   *   An array of trigger entities to list.
   */
  protected function showTriggersList(array $triggers) {
    $tableHeader = [
      $this->trans('Trigger'),
      $this->trans('Target Entity'),
      $this->trans('Cron Status'),
      $this->trans('Next Run'),
      $this->trans('Status'),
    ];

    $tableRows = [];

    foreach ($triggers as $trigger) {
      $dispatch_controller = new EventDispatchController($trigger);
      /** @var \Drupal\commerce_eta\Entity\Trigger $trigger */
      $tableRows[] = [
        $trigger->id(),
        $trigger->getTargetEntityType(),
        ($trigger->getCronStatus() == TRUE) ? 'Enabled' : 'Disabled',
        $dispatch_controller->getNextRunCount(),
        ($trigger->getStatus() == TRUE) ? 'Enabled' : 'Disabled',

      ];
    }

    $this->getIo()->table(
      $tableHeader,
      $tableRows
    );
  }

}
