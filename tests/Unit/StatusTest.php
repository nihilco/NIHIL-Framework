<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusTest extends TestCase
{
    use Databasetransactions;

    protected $status;
    
    public function setUp()
    {
        parent::setUp();

        $this->status = create('App\Models\Status');
    }

    public function test_a_status_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->status->user);
    }
    
}