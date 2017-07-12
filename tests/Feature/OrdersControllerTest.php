<?php

namespace Tests\Feature;

use Tests\TestCase;

class OrdersControllerTest extends TestCase
{
    protected $order;
    
    public function setUp()
    {
        parent::setUp();

        $this->order = create('App\Models\Order');
    }

    public function test_orders_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/orders');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->order->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/orders/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/orders');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->order->path());
        $response->assertStatus(302);
    }
}