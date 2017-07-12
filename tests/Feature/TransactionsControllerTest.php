<?php

namespace Tests\Feature;

use Tests\TestCase;

class TransactionsControllerTest extends TestCase
{
    protected $transaction;
    
    public function setUp()
    {
        parent::setUp();

        $this->transaction = create('App\Models\Transaction');
    }

    public function test_transactions_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/transactions');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->transaction->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/transactions/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/transactions');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->transaction->path());
        $response->assertStatus(302);
    }
}