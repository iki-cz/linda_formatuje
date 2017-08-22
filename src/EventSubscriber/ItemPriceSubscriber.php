<?php
namespace Drupal\linda_formatuje\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;
use Drupal\commerce_cart\Event;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

/**
 * Class ItemPriceSubscriber.
 */
class ItemPriceSubscriber implements EventSubscriberInterface {

  public function updateItemPrice(FilterResponseEvent $event) {
  	$response = $event->getResponse();
  }
  
  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
  	$events[Drupal\commerce_cart\Event::CART_ENTITY_ADD][] = ['updateItemPrice'];
  	
    return $events;
  }
}
