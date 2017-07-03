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

}