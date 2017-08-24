<?php
namespace Drupal\linda_formatuje\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;
// use Drupal\commerce_cart\Event\CartEvents;
use Drupal\commerce_cart\Event\CartEntityAddEvent;
use Drupal\commerce_price\Price;

/**
 * Class ItemPriceSubscriber.
 */
class ItemPriceSubscriber implements EventSubscriberInterface {

  public function updateItemPrice(CartEntityAddEvent $event) {
//   	$response = $event->getResponse();
		$orderItem = $event->getOrderItem();
		
// 		var_dump($orderItem->getAdjustments());
// 		drupal_set_message(sprintf('pocet stranek %1$s', 
// 				$orderItem->getData('field_pocet_stranek')));
  	//drupal_set_message('Pridani nove polozky do kosiku');
//   	$unitPrice = new Price(233, 'CZK');
//   	$event->getOrderItem()->setUnitPrice($unitPrice, true); //true je overridden_unit_price

		//http://docs.drupalcommerce.org/v2/recipes/orders.html
// 		$unitPrice = new \Drupal\commerce_price\Price('9.11', 'CZK');
// 		$orderItem->setUnitPrice($unitPrice, true); //true je overridden_unit_price
// 		$orderItem->save();

// 		$orderItem->getData($key);
// 		$orderItem->get('data');
// 		kint_require();
// 		drupal_set_message(Kint::dump($orderItem));
  }
  
  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
		//$events[Drupal\commerce_cart\Event\CartEvents::CART_ENTITY_ADD][] = ['updateItemPrice'];
  	$events['commerce_cart.entity.add'][] = ['updateItemPrice'];
  	
    return $events;
  }
}
