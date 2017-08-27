<?php 
namespace Drupal\linda_formatuje;

class PriceCalculator{
	const PAGE_PRICE = 19.9;
	const EXPRESS_PRICE = 399;
	
	
	public function calculate($pocetStranek, $horiTo){
		$price = intval($pocetStranek) * self::PAGE_PRICE + intval($horiTo) * self::EXPRESS_PRICE;
		return $price;
	}
}