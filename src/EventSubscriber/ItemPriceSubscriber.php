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
  	drupal_set_message('Pridani nove polozky do kosiku');
//   	$unitPrice = new Price(233, 'CZK');
//   	$event->getOrderItem()->setUnitPrice($unitPrice);
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
