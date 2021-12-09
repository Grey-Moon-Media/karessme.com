<?php

namespace Drupal\commerce_eta\Command;

use Drupal\user\Entity\User;
use Drupal\commerce_eta\Controller\EventDispatchController;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Drupal\Console\Core\Command\ContainerAwareCommand;
use Drupal\commerce_eta\Entity\Trigger;

/**
 * Class FireAllTriggersCommand.
 *
 * Drupal\Console\Annotations\DrupalCommand (
 *     extension="commerce_eta",
 *     extensionType="module"
 * )
 */
class FireAllTriggersCommand extends ContainerAwareCommand {

  /**
   * {@inheritdoc}
   */
  protected function configure() {
    $this
      ->setName('commerce_eta:fire:all')
      ->setDescription($this->trans('commands.commerce_eta.fire.all.description'));
  }

  /**
   * {@inheritdoc}
   */
  protected function execute(InputInterface $input, OutputInterface $output) {
    $accountSwitcher = \Drupal::service('account_switcher');
    $account = User::load(1);
    $accountSwitcher->switchTo($account);

    $triggers = Trigger::loadMultiple();

    foreach ($triggers as $trigger) {
      $eventDispatchController = new EventDispatchController($trigger);

      $this->getIo()->info('Firing ' . $trigger->label() . ' on ' . $eventDispatchController->getNextRunCount() . ' entities');

      $eventDispatchController->fire();
    }

    $accountSwitcher->switchBack();
  }

}
