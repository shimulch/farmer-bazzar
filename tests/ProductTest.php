<?php

class AuthTest extends TestCase {

	public function testGetProduct()
	{
		$response = $this->call('GET', '/api/products');

		$this->assertEquals(200, $response->getStatusCode());

	}

}
