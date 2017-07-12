<?php

namespace Tests\Feature;

use Tests\TestCase;

class EmailsControllerTest extends TestCase
{
    protected $email;
    
    public function setUp()
    {
        parent::setUp();

        $this->email = create('App\Models\Email');
    }

    public function test_emails_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/emails');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->email->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/emails/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/emails');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->email->path());
        $response->assertStatus(302);
    }
}