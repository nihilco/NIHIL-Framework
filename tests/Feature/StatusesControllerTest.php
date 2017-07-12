<?php

namespace Tests\Feature;

use Tests\TestCase;

class StatusesControllerTest extends TestCase
{
    protected $status;
    
    public function setUp()
    {
        parent::setUp();

        $this->status = create('App\Models\Status');
    }

    public function test_statuses_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/statuses');
        $response->assertStatus(200);

        // SHOW 
        $response = $this->get($this->status->path());
        $response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/statuses/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/statuses');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->status->path());
        $response->assertStatus(302);
    }    
}