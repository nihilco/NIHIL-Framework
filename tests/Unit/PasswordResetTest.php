<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PasswordResetTest extends TestCase
{
    use Databasetransactions;

    protected $passwordReset;
    
    public function setUp()
    {
        parent::setUp();

        $this->passwordReset = create('App\Models\PasswordReset');
    }
    
}