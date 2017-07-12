<?php

namespace Tests\Feature;

use Tests\TestCase;

class AccountsControllerTest extends TestCase
{
    protected $account;
    
    public function setUp()
    {
        parent::setUp();

        $this->account = create('App\Models\Account');
    }

    public function test_accounts_controller_routes_entry()
    {
        // INDEX  - User not logged in, redirect to login
        $response = $this->get('/accounts');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        
        // SHOW  - User not logged in, redirect to login
        $response = $this->get($this->account->path());
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/accounts/create');
        $response->assertStatus(302);
        $response->assertRedirect('/login');

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/accounts');
        $response->assertStatus(302);
        $response->assertRedirect('/login');

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete('/accounts');
        $response->assertStatus(405);
    }
}