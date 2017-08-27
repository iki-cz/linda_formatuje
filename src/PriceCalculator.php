<?php 
namespace Drupal\linda_formatuje;

class PriceCalculator{
	const PAGE_PRICE = 19.9;
	const EXPRESS_PRICE = 399;
	const BASE_PRICE = 999;
	const BASE_PAGES_COUNT = 50;
	
	public function calculate($pocetStranek, $horiTo){
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