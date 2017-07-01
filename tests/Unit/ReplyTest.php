<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReplyTest extends TestCase
{
    use Databasetransactions;

    protected $reply;

    public function setUp()
    {
        parent::setUp();

        $this->reply = create('App\Models\Reply');
    }
    
    public function test_reply_has_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->reply->user);
    }

    public function test_a_reply_has_a_thread()
    {
        $this->assertInstanceOf('App\Models\Thread', $this->reply->thread);
    }
}