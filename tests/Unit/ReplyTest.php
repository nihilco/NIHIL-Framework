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

        $this->thread = create('App\Models\Thread');
        $this->reply = create('App\Models\Reply', ['resource_id' => $this->thread->id, 'resource_type' => get_class($this->thread)]);
    }
    
    public function test_a_reply_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->reply->user);
    }

    public function test_a_reply_has_a_resource()
    {
        $this->assertInstanceOf($this->reply->resource_type, $this->reply->resource);
    }
}