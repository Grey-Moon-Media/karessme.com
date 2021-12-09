<?php

namespace Drupal\commerce_eta_abandoned_carts\EventSubscriber;

use Drupal\commerce_eta\Event\OrderEvent;
use Drupal\views\Views;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Subscribes to Abandoned Carts Events.
 */
class EmailSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events['commerce_eta.order'] = ['sendEmail'];

    return $events;
  }

  /**
   * This method is called when the commerce_eta.order is dispatched.
   *
   * @param Drupal\commerce_eta\Event\OrderEvent $event
   *   The dispatched event.
   */
  public function sendEmail(OrderEvent $event) {
    /** @var \Drupal\commerce_eta\Event\OrderEvent $event */
    if ($event->getTrigger()->id() == 'abandoned_carts') {

      $mail = $mailManager = \Drupal::service('plugin.manager.mail');

      $module = 'commerce_eta_abandoned_carts';
      $key = 'abandoned_cart_mail';
      $to = $event->getOrder()->getEmail();
      $params['order_view'] = $this->buildOrderTable($event);
      $langcode = $event->getOrder()->getCustomer()->getPreferredLangcode(TRUE);
      $send = TRUE;
      $mail->mail($module, $key, $to, $langcode, $params, NULL, $send);
    }
  }

  /**
   * Renders the view chosen in the form or the default.
   *
   * @param \Drupal\commerce_eta\Event\OrderEvent $event
   *   OrderEvent definition.
   *
   * @return array
   *   Render array to place in the email.
   */
  private function buildOrderTable(OrderEvent $event) {

    $config = \Drupal::config('commerce_eta_abandoned_carts.abandoned_carts');

    if (!empty($config->get('order_view'))) {
      $view = Views::getView($config->get('order_view'));
    }
    else {
      // Use the default view installed with the module.
      $view = Views::getView('abandoned_cart_item_table');
    }

    if (is_object($view)) {
      $view->setArguments([$event->getOrder()->id()]);

      // TOO DOO: Set this in the config form.
      $view->setDisplay('email');

      $view->preExecute();
      $view->execute();

      return $view->render('master');
    }
  }

}
