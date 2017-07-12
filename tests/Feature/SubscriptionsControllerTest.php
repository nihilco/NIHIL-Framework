<?php

namespace Tests\Feature;

use Tests\TestCase;

class SubscriptionsControllerTest extends TestCase
{
    protected $subscription;
    
    public function setUp()
    {
        parent::setUp();

        $this->subscription = create('App\Models\Subscription');
    }

    public function test_subscriptions_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/subscriptions');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->subscription->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/subscriptions/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/subscriptions');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->subscription->path());
        $response->assertStatus(302);
    }    
}