<?php

namespace Tests\Feature;

use Tests\TestCase;

class LinksControllerTest extends TestCase
{
    protected $link;
    
    public function setUp()
    {
        parent::setUp();

        $this->link = create('App\Models\Link');
    }

    public function test_links_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/links');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->link->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/links/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/links');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->link->path());
        $response->assertStatus(302);
    }
}