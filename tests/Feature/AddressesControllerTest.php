<?php

namespace Tests\Feature;

use Tests\TestCase;

class AddressesControllerTest extends TestCase
{
    protected $address;
    
    public function setUp()
    {
        parent::setUp();

        $this->address = create('App\Models\Address');
    }

    public function test_addresses_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/addresses');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->address->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/addresses/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/addresses');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->address->path());
        $response->assertStatus(302);
    }
}