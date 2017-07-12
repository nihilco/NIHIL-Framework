<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    use Databasetransactions;

    protected $product;
    
    public function setUp()
    {
        parent::setUp();

        $this->product = create('App\Models\Product');
    }

    public function test_a_product_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->product->user);
    }

    public function test_a_product_has_an_account()
    {
        $this->assertInstanceOf('App\Models\Account', $this->product->account);
    }
    
}