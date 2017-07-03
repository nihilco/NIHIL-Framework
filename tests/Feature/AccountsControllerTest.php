<?php

namespace Tests\Feature;

use Tests\TestCase;

class AccountsControllerTest extends TestCase
{
    protected $account;
    
    public function setUp()
    {
        parent::setUp();

        $this->account = create('App\Models\Account');
    }

}