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

    public function test_a_transaction_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->transaction->user);
    }
    
}