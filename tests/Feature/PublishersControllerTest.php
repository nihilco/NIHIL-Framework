<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublishersControllerTest extends TestCase
{
    protected $publisher;
    
    public function setUp()
    {
        parent::setUp();

        $this->publisher = create('App\Models\Publisher');
    }

    public function test_publishers_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/publishers');
        $response->assertStatus(200);

        // SHOW 
        $response = $this->get($this->publisher->path());
        $response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/publishers/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/publishers');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->publisher->path());
        $response->assertStatus(302);
    }
}