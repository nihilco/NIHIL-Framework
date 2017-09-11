<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthorsControllerTest extends TestCase
{
    protected $author;
    
    public function setUp()
    {
        parent::setUp();

        $this->author = create('App\Models\Author');
    }

    public function test_authors_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/authors');
        $response->assertStatus(200);

        // SHOW 
        $response = $this->get($this->author->path());
        $response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/authors/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/authors');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->author->path());
        $response->assertStatus(302);
    }
}