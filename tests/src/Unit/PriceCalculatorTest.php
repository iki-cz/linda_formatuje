<?php
namespace Drupal\Tests\linda_formatuje\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\linda_formatuje\PriceCalculator;

class PriceCalculatorTest extends UnitTestCase{
	public function testPriceCalculation(){
		$data = array(
				array(
						'pocetStranek' => 10,
						'horiTo' => false,
						'price' => 199
				),
		);
		
		$priceCalculator = new PriceCalculator();

		foreach ($data as $value) {
			$price = $priceCalculator->calculate($value['pocetStranek'], $value['horiTo']);
			$this->assertEquals($price, $value['price']);
		}
	}
}