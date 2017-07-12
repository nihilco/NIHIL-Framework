<?php

namespace Tests\Feature;

use Tests\TestCase;

class PaymentsControllerTest extends TestCase
{
    protected $payment;
    
    public function setUp()
    {
        parent::setUp();

        $this->payment = create('App\Models\Payment');
    }
    
    public function test_payments_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/payments');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->payment->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/payments/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/payments');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->payment->path());
        $response->assertStatus(302);
    }
}