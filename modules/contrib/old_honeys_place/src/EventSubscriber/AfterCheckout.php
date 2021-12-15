<?php
namespace Drupal\honeys_place\EventSubscriber;

use Drupal\commerce_checkout\Event\CheckoutEvents;
use Drupal\commerce_order\Entity\Order;
use Drupal\commerce_order\Event\OrderEvent;
use Drupal\commerce_order\Event\OrderEvents;
use Drupal\Core\Entity\EntityStorageException;
use Drupal\Core\Logger\LoggerChannelFactory;
use Drupal\honeys_place\Service\HoneyOrderManagementService;
use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Throwable;

class AfterCheckout implements EventSubscriberInterface
{
  /**
   * @var HoneyOrderManagementService
   */
  private $honeyOrderManagementService;
  /**
   * @var LoggerChannelFactory
   */
  private $loggerChannelFactory;

  /**
   * AfterCheckout constructor.
   * @param HoneyOrderManagementService $honeyOrderManagementService
   * @param LoggerChannelFactory $loggerChannelFactory
   */
  public function __construct(HoneyOrderManagementService $honeyOrderManagementService, LoggerChannelFactory $loggerChannelFactory)
  {
    $this->honeyOrderManagementService = $honeyOrderManagementService;
    $this->loggerChannelFactory = $loggerChannelFactory;
  }

  public function create(ContainerInterface $container)
  {
    return new static(
      $container->get('honey_order_management'),
      $container->get('logger.factory')
    );
  }

  /**
   * Returns an array of event names this subscriber wants to listen to.
   *
   * The array keys are event names and the value can be:
   *
   *  * The method name to call (priority defaults to 0)
   *  * An array composed of the method name to call and the priority
   *  * An array of arrays composed of the method names to call and respective
   *    priorities, or 0 if unset
   *
   * For instance:
   *
   *  * ['eventName' => 'methodName']
   *  * ['eventName' => ['methodName', $priority]]
   *  * ['eventName' => [['methodName1', $priority], ['methodName2']]]
   *
   * The code must not depend on runtime state as it will only be called at compile time.
   * All logic depending on runtime state must be put into the individual methods handling the events.
   *
   * @return array The event names to listen to
   */
  public static function getSubscribedEvents()
  {
    $events[CheckoutEvents::COMPLETION] = ['respondToCheckoutComplete', 0];
//    $events[OrderEvents::ORDER_LOAD] = ['respondToCheckoutComplete', 0]; //get status
    $events[OrderEvents::ORDER_UPDATE] = ['respondToOdrderStatusChange', 0];
    return $events;
  }

  /**
   * @param OrderEvent $event
   */
  public function respondToCheckoutComplete(OrderEvent $event)
  {
    try {
      $honeyOrder = $this->honeyOrderManagementService->createOrderInHoneysPlace($event->getOrder());
      if ($honeyOrder) {
        $order = Order::load($event->getOrder()->id());
        $order->set('field_honey_order_created', 1);
        $order->save();
      }
    } catch (Exception $e) {
      watchdog_exception('honeys_place', $e);
    } catch (Throwable $t) {
      $this->loggerChannelFactory->get('honeys_place')->error($t->getMessage());
    }
  }
  
  public function respondToOdrderStatusChange(OrderEvent $event)
  {
    try {
        $order_id = $event->getOrder()->id();
		$order = $event->getOrder();

        $response = $this->honeyOrderManagementService->getHoneyOrderStatus($order_id);
        $order_data_response = $response->getData();
        $order_state = $order->getState()->getId();
		
		if($order_state == 'completed'){
			
			if($response->getStatus() == "Shipped" && $order_data_response['shipagent'] == "USPS"){
			  $trackingnumber1 = $order_data_response['trackingnumber1'];
			  
			  //$order = Order::load($order_id);
			  //$order->set('field_usps_tracking_number', $trackingnumber1);
			  //$order->save();
			  $connection = \Drupal::service('database');

			  $coquery = \Drupal::database()->select('commerce_order', 'co');
			  $coquery->fields('co', ['mail','order_number']);
			  $coquery->condition('co.order_id', $order_id);
			  $order_query = $coquery->execute()->fetchAssoc();

			  $cofutnquery = \Drupal::database()->select('commerce_order__field_usps_tracking_number', 'cofutn');
			  $cofutnquery->fields('cofutn', ['entity_id']);
			  $cofutnquery->condition('cofutn.entity_id', $order_id);
			  $hastrackingno = $cofutnquery->execute()->fetchAssoc();
			  $order_number = $order_query['order_number'];
			  if($trackingnumber1){
				if($hastrackingno){
				  \Drupal::database()->update('commerce_order__field_usps_tracking_number')->fields(array('field_usps_tracking_number_value' => $trackingnumber1))->condition('entity_id', $order_id)->condition('bundle', 'default')->execute();
				}else{
				  $cofutnresult = $connection->insert('commerce_order__field_usps_tracking_number')->fields(['bundle' => 'default','deleted' => 0,'entity_id' => $order_id,'revision_id' => $order_id,'langcode' => 'und','delta' => 0,'field_usps_tracking_number_value' => $trackingnumber1])->execute();

				  if($order_query){
					$cust_email = $order_query['mail'];
				  }else{
					$cust_email = "";
				  }

				  if($cust_email){
					$mailManager = \Drupal::service('plugin.manager.mail');
					$module = 'honeys_place';
					$key = 'OrderTrackNumber';
					$to = $cust_email;
					$params['message'] = "<p>Your Order with #".$order_number." has been shipped through USGS courier service.</br> Your tracking number is ".$trackingnumber1."</p>";
					$params['subject'] = "Your Order #".$order_number." is shipped";
					$langcode = \Drupal::currentUser()->getPreferredLangcode();
					$send = true;

					$result = $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);
				  }
				}
			  }
			}
		}
    } catch (Exception $e) {
      watchdog_exception('honeys_place', $e);
    } catch (Throwable $t) {
      $this->loggerChannelFactory->get('honeys_place')->error($t->getMessage());
    }
  }
}

