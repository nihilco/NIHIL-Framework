<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegionsControllerTest extends TestCase
{
    protected $region;
    
    public function setUp()
    {
        parent::setUp();

        $this->region = create('App\Models\Region');
    }

    public function test_regions_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/regions');
        $response->assertStatus(200);

        // SHOW 
        $response = $this->get($this->region->path());
        $response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/regions/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/regions');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->region->path());
        $response->assertStatus(302);
    }    
}