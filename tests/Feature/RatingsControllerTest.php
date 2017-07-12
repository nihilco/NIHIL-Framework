<?php

namespace Tests\Feature;

use Tests\TestCase;

class RatingsControllerTest extends TestCase
{
    protected $rating;
    
    public function setUp()
    {
        parent::setUp();

        $this->rating = create('App\Models\Rating');
    }

    public function test_ratings_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/ratings');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->rating->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/ratings/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/ratings');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->rating->path());
        $response->assertStatus(302);
    }    
}