<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

   /* public function test_display_home_page(){
        $response = $this->call('GET','/');
        var_dump($response->getContent());
    }*/

}