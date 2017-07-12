<?php

namespace Tests\Feature;

use Tests\TestCase;

class SourcesControllerTest extends TestCase
{
    protected $source;
    
    public function setUp()
    {
        parent::setUp();

        $this->source = create('App\Models\Source');
    }

    public function test_sources_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/sources');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->source->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/sources/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/sources');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->source->path());
        $response->assertStatus(302);
    }    
}