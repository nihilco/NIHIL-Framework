<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use Databasetransactions;

    protected $user;
    
    public function setUp()
    {
        parent::setUp();

        $this->user = create('App\Models\User');
    }
   
}