<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExceptionsControllerTest extends TestCase
{
    protected $exception;
    
    public function setUp()
    {
        parent::setUp();

        $this->exception = create('App\Models\Exception');
    }

    public function test_exceptions_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/exceptions');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->exception->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/exceptions/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/exceptions');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->exception->path());
        $response->assertStatus(302);
    }
}