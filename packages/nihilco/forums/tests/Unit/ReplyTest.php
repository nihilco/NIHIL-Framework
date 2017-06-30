<?php

namespace NIHILCo\Forums\Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReplyTest extends TestCase
{
    use Databasetransactions;

    protected $reply;

    public function setUp()
    {
        parent::setUp();

        $this->reply = create('NIHILCo\Forums\Models\Reply');
    }
    
    public function test_reply_has_user()
    {
        $this->assertInstanceOf('App\User', $this->reply->user);
    }

    public function test_a_reply_has_a_thread()
    {
        $this->assertInstanceOf('NIHILCo\Forums\Models\Thread', $this->reply->thread);
    }
}