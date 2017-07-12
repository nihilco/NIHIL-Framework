<?php

namespace Tests\Feature;

use Tests\TestCase;

class TagsControllerTest extends TestCase
{
    protected $tag;
    
    public function setUp()
    {
        parent::setUp();

        $this->tag = create('App\Models\Tag');
    }

    public function test_tags_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/tags');
        $response->assertStatus(200);

        // SHOW 
        $response = $this->get($this->tag->path());
        $response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/tags/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/tags');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->tag->path());
        $response->assertStatus(302);
    }    
}