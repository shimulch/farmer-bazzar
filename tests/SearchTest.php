<?php

class SearchTest extends TestCase {
	
	public function testSearchContainsTotal()
	{

		
		$response = $this->call('GET', '/api/products/search?main_category=2&district=%22sasd%22&search=&page=1&take=5');		

		$this->assertEquals(200, $response->getStatusCode());

		$this->assertArrayHasKey('total', json_decode($response->getContent(), true));
		$this->assertArrayHasKey('products', json_decode($response->getContent(), true));
	}

	
}