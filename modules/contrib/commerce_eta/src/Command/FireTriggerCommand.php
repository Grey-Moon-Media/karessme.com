<?php

namespace Drupal\commerce_eta\Command;

use Drupal\commerce_eta\Controller\EventDispatchController;
use Drupal\commerce_eta\Entity\Trigger;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Drupal\Console\Core\Command\ContainerAwareCommand;
use Drupal\user\Entity\User;

/**
 * Class FireTriggerCommand.
 *
 * Drupal\Console\Annotations\DrupalCommand (
 *     extension="commerce_eta",
 *     extensionType="module"
 * )
 */
class FireTriggerCommand extends ContainerAwareCommand {

  /**
   * {@inheritdoc}
   */
  protected function configure() {
    $this
      ->setName('commerce_eta:fire')
      ->setDescription($this->trans('commands.commerce_eta.fire.description'))
      ->addArgument(
        'trigger',
        InputArgument::REQUIRED,
        $this->trans('Test')
      );
  }

  /**
   * {@inheritdoc}
   */
  protected function execute(InputInterface $input, OutputInterface $output) {

    $accountSwitcher = \Drupal::service('account_switcher');
    $account = User::load(1);
    $accountSwitcher->switchTo($account);

    $triggerArg = $input->getArgument('trigger');

    $trigger = Trigger::load($input->getArgument('trigger'));

    if (!empty($trigger)) {
      $eventDispatchController = new EventDispatchController($trigger);

      $this->getIo()->info('Firing ' . $trigger->label() . ' on ' . $eventDispatchController->getNextRunCount() . ' entities');

      $eventDispatchController->fire();
    }
    else {
      $this->getIo()->warning('Oops, that trigger does not exist.');
    }

    $accountSwitcher->switchBack();
  }

}
