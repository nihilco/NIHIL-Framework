<?php

namespace Tests\Feature;

use Tests\TestCase;

class InvoicesControllerTest extends TestCase
{
    protected $invoice;
    
    public function setUp()
    {
        parent::setUp();

        $this->invoice = create('App\Models\Invoice');
    }

    public function test_invoices_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/invoices');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->invoice->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/invoices/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/invoices');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->invoice->path());
        $response->assertStatus(302);
    }
}