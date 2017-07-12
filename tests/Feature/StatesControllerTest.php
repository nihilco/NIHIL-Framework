<?php

namespace Tests\Feature;

use Tests\TestCase;

class StatesControllerTest extends TestCase
{
    protected $state;
    
    public function setUp()
    {
        parent::setUp();

        $this->state = create('App\Models\State');
    }

    public function test_states_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/states');
        $response->assertStatus(200);

        // SHOW 
        $response = $this->get($this->state->path());
        $response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/states/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/states');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->state->path());
        $response->assertStatus(302);
    }    
}