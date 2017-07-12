<?php

namespace Tests\Feature;

use Tests\TestCase;

class CurrenciesControllerTest extends TestCase
{
    protected $currency;
    
    public function setUp()
    {
        parent::setUp();

        $this->currency = create('App\Models\Currency');
    }

    public function test_currencies_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/currencies');
        $response->assertStatus(200);

        // SHOW 
        $response = $this->get($this->currency->path());
        $response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/currencies/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/currencies');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->currency->path());
        $response->assertStatus(302);
    }
}