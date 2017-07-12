<?php

namespace Tests\Feature;

use Tests\TestCase;

class PlansControllerTest extends TestCase
{
    protected $plan;
    
    public function setUp()
    {
        parent::setUp();

        $this->plan = create('App\Models\Plan');
    }

    public function test_plans_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/plans');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->plan->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/plans/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/plans');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->plan->path());
        $response->assertStatus(302);
    }    
}