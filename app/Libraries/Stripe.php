<?php

namespace App\Libraries;

use App\Models\Account;
use Illuminate\Support\Collection;

class Stripe
{
    protected $config;
    protected $accounts;
    
    public function __construct($mode)
    {
        if($mode == 'live') {
            $this->config = Account::find(2);
        } else {
            $this->config = Account::find(1);
        }
        
        $this->accounts = Account::all();
    }

    //
    //  ACCOUNTS
    //
    public function createAccount($data)
    {
        return \Stripe\Account::create($data , $this->getSecretKey());
    }

    public function getAllAccounts()
    {
        return \Stripe\Account::all([], $this->getSecretKey());
    }

    public function retrieveAccount($id)
    {
        return \Stripe\Account::retrieve($id, $this->getSecretKey());
    }

    //
    // CHARGES
    //
    public function createCharge($data)
    {
        return \Stripe\Charge::create($data , $this->getSecretKey());
    }

    public function getAllCharges()
    {
        return \Stripe\Charges::all([], $this->getSecretKey());
    }

    public function retrieveCharge($id)
    {
        return \Stripe\Charge::retrieve($id, $this->getSecretKey());
    }

    //
    // CUSTOMERS
    //
    public function getAllCustomers()
    {
        return \Stripe\Customer::all([], $this->getSecretKey());
    }

    public function createCustomer($data)
    {
        return \Stripe\Customer::create($data, $this->getSecretKey());
    }

    public function retrieveCustomer($id)
    {
        return \Stripe\Customer::retrieve($id, $this->getSecretKey());
    }

    //
    //  PLANS
    //
    public function createPlan($data)
    {
        return \Stripe\Plan::create($data , $this->getSecretKey());
    }

    public function getAllPlans()
    {
            return \Stripe\Plan::all([], $this->getSecretKey());
    }

    public function retrievePlan($id)
    {
        return \Stripe\Plan::retrieve($id, $this->getSecretKey());
    }

    //
    // TOKENS
    //
    public function createToken($data)
    {
        return \Stripe\Token::create($data , $this->getSecretKey());
    }

    public function retrieveToken($id)
    {
        return \Stripe\Token::retrieve($id, $this->getSecretKey());
    }
    
    //
    //
    //
    protected function getSecretKey()
    {
        return \Crypt::decrypt($this->config->secret_key);
    }

    public function getPublishableKey()
    {
        return $this->config->publishable_key;
    }

    protected function getAccountId()
    {
        return $this->config->stripe_id;
    }

    protected function getApiVersion()
    {
        return $this->config->api_version;
    }
}