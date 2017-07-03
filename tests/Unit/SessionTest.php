<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SessionTest extends TestCase
{
    use Databasetransactions;

    protected $session;
    
    public function setUp()
    {
        parent::setUp();

        $this->session = create('App\Models\Session');
    }

    public function test_a_session_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->session->user);
    }
    
}