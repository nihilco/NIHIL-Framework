<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadTest extends TestCase
{
    use Databasetransactions;
    
    protected $thread;
    
    public function setUp()
    {
        parent::setUp();

        $this->thread = create('App\Models\Thread');   
    }
    
    public function test_thread_has_replies()
    {

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    public function test_a_thread_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->thread->user);
    }

    public function test_a_thread_can_add_a_reply()
    {
        $this->thread->addReply([
            'body' => 'Foobar',
            'user_id' => 1,
        ]);

        $this->assertCount(1, $this->thread->replies);
    }

    public function test_a_thread_belongs_to_a_forum()
    {
        $this->assertInstanceOf('App\Models\Forum', $this->thread->forum);
    }

    public function test_a_thread_can_make_a_sting_path()
    {
        $this->assertEquals('/forums/' . $this->thread->forum->slug . '/' . $this->thread->slug, $this->thread->path());
    }
}