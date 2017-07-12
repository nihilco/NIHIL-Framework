<?php

namespace Tests\Feature;

use Tests\TestCase;

class UsersControllerTest extends TestCase
{
    protected $user;
    
    public function setUp()
    {
        parent::setUp();

        $this->user = create('App\Models\User');
    }

    public function test_users_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/users');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->user->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/users/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/users');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->user->path());
        $response->assertStatus(302);
    }    
}