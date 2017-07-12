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

    public function test_an_account_has_customers()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->account->customers);

    }

    public function test_an_account_has_invoices()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->account->invoices);

    }

    public function test_an_account_has_oders()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->account->orders);

    }

    public function test_an_account_has_payments()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->account->payments);

    }

    public function test_an_account_has_plans()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->account->plans);

    }

    public function test_an_account_has_products()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->account->products);

    }

    public function test_an_account_has_sources()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->account->sources);

    }

    public function test_an_account_has_subscriptions()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->account->subscriptions);

    }

    public function test_an_account_has_transactions()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->account->transactions);

    }
}