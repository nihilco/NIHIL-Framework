<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransactionTest extends TestCase
{
    use Databasetransactions;

    protected $transaction;
    
    public function setUp()
    {
        parent::setUp();

        $this->transaction = create('App\Models\Transaction');
    }

    public function test_a_transaction_has_a_type()
    {
        $this->assertInstanceOf('App\Models\Type', $this->transaction->type);
    }

    public function test_a_transaction_has_an_account()
    {
        $this->assertInstanceOf('App\Models\Account', $this->transaction->account);
    }

    public function test_a_transaction_has_a_fromSource()
    {
        $this->assertInstanceOf('App\Models\Source', $this->transaction->fromSource);
    }

    public function test_a_transaction_has_a_toSource()
    {
        $this->assertInstanceOf('App\Models\Source', $this->transaction->toSource);
    }
    
}