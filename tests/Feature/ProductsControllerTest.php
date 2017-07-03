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

}