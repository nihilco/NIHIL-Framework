<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductsControllerTest extends TestCase
{
    protected $product;
    
    public function setUp()
    {
        parent::setUp();

        $this->product = create('App\Models\Product');
    }

    public function test_products_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/products');
        $response->assertStatus(200);

        // SHOW 
        $response = $this->get($this->product->path());
        $response->assertStatus(200);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/products/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/products');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->product->path());
        $response->assertStatus(302);
    }
}