<?php

namespace Tests\Feature;

use Tests\TestCase;

class CategoriesControllerTest extends TestCase
{
    protected $category;
    
    public function setUp()
    {
        parent::setUp();

        $this->category = create('App\Models\Category');
    }

    public function test_categories_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/categories');
        $response->assertStatus(200);

        // SHOW 
        $response = $this->get($this->category->path());
        $response->assertStatus(200);
        
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/categories/create');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        
        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/categories');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        
        // DELETE  - User not logged in, redirect to login
        $response = $this->delete('/categories');
        $response->assertStatus(405);
    }
}