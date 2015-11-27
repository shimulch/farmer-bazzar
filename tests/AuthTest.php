<?php

class AuthTest extends TestCase {

	public function testUnauthorizedLogin()
	{
		$response = $this->call('POST', '/api/authenticate');

		$this->assertEquals(401, $response->getStatusCode());

		$response = $this->call('POST', '/api/authenticate', ['phone_no' => '01818353742', 'password' => '12345679']);

		$this->assertEquals(401, $response->getStatusCode());
	}

	public function testauthorizedLogin()
	{
		$response = $this->call('POST', '/api/authenticate', ['phone_no' => '01818353742', 
			'password' => '12345678']);

		$this->assertEquals(200, $response->getStatusCode());
	}

}
