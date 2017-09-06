<?php 
namespace Drupal\linda_formatuje\PriceCalculator;

class KorekturaPriceCalculator implements IPriceCalculator{
	const PAGE_PRICE = 24.9;
	const EXPRESS_PRICE = 399;
	const BASE_PRICE = 1499;
	const BASE_PAGES_COUNT = 50;

	private $orderItem;
	
	public function __construct($orderItem){
		$this->orderItem = $orderItem;
	}
	
	public function calculate(){
		$pocetStranek = (int) $this->orderItem->field_pocet_normostran->getString();
		$horiTo = $this->orderItem->field_hori_to->getString();
		
		$price = self::BASE_PRICE;
		
		//pages 50+
		if($pocetStranek > self::BASE_PAGES_COUNT){
			$price += (intval($pocetStranek) - self::BASE_PAGES_COUNT) * self::PAGE_PRICE;
		}

		//express
		$price += intval($horiTo) * self::EXPRESS_PRICE;
		
		$price = round($price);
		
		return $price;
	}
}