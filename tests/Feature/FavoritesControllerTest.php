<?php

namespace Tests\Feature;

use Tests\TestCase;

class FavoritesControllerTest extends TestCase
{
    protected $favorite;
    
    public function setUp()
    {
        parent::setUp();

        $this->favorite = create('App\Models\Favorite');
    }

    public function test_favorites_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/favorites');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->favorite->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/favorites/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/favorites');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->favorite->path());
        $response->assertStatus(302);
    }
}