<?php

namespace Tests\Feature;

use Tests\TestCase;

class CustomersControllerTest extends TestCase
{
    protected $customer;
    
    public function setUp()
    {
        parent::setUp();

        $this->customer = create('App\Models\Customer');
    }

    public function test_customers_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/customers');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->customer->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/customers/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/customers');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->customer->path());
        $response->assertStatus(302);
    }
}