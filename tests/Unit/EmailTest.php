<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmailTest extends TestCase
{
    use Databasetransactions;

    protected $email;
    
    public function setUp()
    {
        parent::setUp();

        $this->email = create('App\Models\Email');
    }

    public function test_an_email_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->email->user);
    }
    
}