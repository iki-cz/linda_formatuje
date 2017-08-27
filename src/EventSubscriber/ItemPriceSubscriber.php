<?php
namespace Drupal\linda_formatuje\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;
use Drupal\commerce_cart\Event\CartEntityAddEvent;
use Drupal\commerce_price\Price;
use Drupal\linda_formatuje\PriceCalculator;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class ItemPriceSubscriber.
 */
class ItemPriceSubscriber implements EventSubscriberInterface {

  public function updateItemPrice(CartEntityAddEvent $event) {
		$orderItem = $event->getOrderItem();
		
		$pocetStranek = $orderItem->field_pocet_stranek->getString();
		$horiTo = $orderItem->field_hori_to->getString();
		
		$priceCalculator = new PriceCalculator();
		$price = (string) $priceCalculator ->calculate($pocetStranek, $horiTo);
		$unitPrice = new Price($price, 'CZK');
		$orderItem->setUnitPrice($unitPrice, true); //true = overriden
		$orderItem->save();

		//http://docs.drupalcommerce.org/v2/recipes/orders.html
		//$event->setResponse();
		//$url = \Drupal::getContainer()->get('url_generator')->generateFromRoute('commerce_cart.page');
		//$event->setResponse(new RedirectResponse($url));
		//return new RedirectResponse($url);
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
