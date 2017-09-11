<?php

namespace Tests\Feature;

use Tests\TestCase;

class EditionsControllerTest extends TestCase
{
    protected $edition;
    
    public function setUp()
    {
        parent::setUp();

        $this->edition = create('App\Models\Edition');
    }

    public function test_editions_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/editions');
        $response->assertStatus(200);

        // SHOW 
        $response = $this->get($this->edition->path());
        $response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/editions/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/editions');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->edition->path());
        $response->assertStatus(302);
    }
}