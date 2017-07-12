<?php

namespace Tests\Feature;

use Tests\TestCase;

class ActivitiesControllerTest extends TestCase
{
    protected $activity;
    
    public function setUp()
    {
        parent::setUp();

        $this->activity = create('App\Models\Activity');
    }

    public function test_activities_controller_routes_entry()
    {
        // INDEX  - User not logged in, redirect to login
        $response = $this->get('/activities');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        
        // SHOW  - User not logged in, redirect to login
        $response = $this->get($this->activity->path());
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/activities/create');
        $response->assertStatus(302);
        $response->assertRedirect('/login');

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/activities');
        $response->assertStatus(302);
        $response->assertRedirect('/login');

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete('/activities');
        $response->assertStatus(405);
    }
}