<?php

namespace Tests\Feature;

use Tests\TestCase;

class ResolutionsControllerTest extends TestCase
{
    protected $resolution;
    
    public function setUp()
    {
        parent::setUp();

        $this->resolution = create('App\Models\Resolution');
    }

    public function test_resolution_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/resolutions');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->resolution->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/resolutions/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/resolutions');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->resolution->path());
        $response->assertStatus(302);
    }    
}