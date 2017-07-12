<?php

namespace Tests\Feature;

use Tests\TestCase;

class ThemesControllerTest extends TestCase
{
    protected $theme;
    
    public function setUp()
    {
        parent::setUp();

        $this->theme = create('App\Models\Theme');
    }

    public function test_themes_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/themes');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->theme->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/themes/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/themes');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->theme->path());
        $response->assertStatus(302);
    }    
}