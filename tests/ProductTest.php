<?php

class ProductTest extends TestCase {

	public function testGetProduct()
	{
		$response = $this->call('GET', '/api/products');

		$this->assertEquals(200, $response->getStatusCode());

	}

	public function testCategoriezProduct(){
		$response = $this->call('GET', '/api/list-categories/grain-crops/products');
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testGetCategoryList(){
		$response = $this->call('GET', '/api/list-categories');

		$this->assertEquals(9, count(json_decode($response->getContent(), true)));
	}

}
