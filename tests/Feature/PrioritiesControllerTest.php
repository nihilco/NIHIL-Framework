<?php

namespace Tests\Feature;

use Tests\TestCase;

class PrioritiesControllerTest extends TestCase
{
    protected $priority;
    
    public function setUp()
    {
        parent::setUp();

        $this->priority = create('App\Models\Priority');
    }

    public function test_priorities_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/priorities');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->priority->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/priorities/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/priorities');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->priority->path());
        $response->assertStatus(302);
    }    
}