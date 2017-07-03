<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CurrencyTest extends TestCase
{
    use Databasetransactions;

    protected $currency;
    
    public function setUp()
    {
        parent::setUp();

        $this->currency = create('App\Models\Currency');
    }

    public function test_a_currency_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->currency->user);
    }
    
}