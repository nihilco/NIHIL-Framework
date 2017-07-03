<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AccountTest extends TestCase
{
    use Databasetransactions;

    protected $account;
    
    public function setUp()
    {
        parent::setUp();

        $this->account = create('App\Models\Account');
    }

    public function test_an_account_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->account->user);
    }

    public function test_an_account_has_a_country()
    {
        $this->assertInstanceOf('App\Models\Country', $this->account->country);

    }
}