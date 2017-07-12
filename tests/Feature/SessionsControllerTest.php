<?php

namespace Tests\Feature;

use Tests\TestCase;

class SessionsControllerTest extends TestCase
{
    protected $session;
    
    public function setUp()
    {
        parent::setUp();

        $this->session = create('App\Models\Session');
    }

    public function test_sessions_controller_routes_entry()
    {
        // INDEX
        //$response = $this->get('/sessions');
        //$response->assertStatus(200);

        // SHOW 
        //$response = $this->get($this->session->path());
        //$response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        //$response = $this->get('/sessions/create');
        //$response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        //$response = $this->post('/sessions');
        //$response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        //$response = $this->delete($this->session->path());
        //$response->assertStatus(302);
    }    
}