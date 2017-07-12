<?php

namespace Tests\Feature;

use Tests\TestCase;

class CountriesControllerTest extends TestCase
{
    protected $country;
    
    public function setUp()
    {
        parent::setUp();

        $this->country = create('App\Models\Country');
    }

    public function test_countries_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/countries');
        $response->assertStatus(200);

        // SHOW 
        $response = $this->get($this->country->path());
        $response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/countries/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/countries');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->country->path());
        $response->assertStatus(302);
    }
}