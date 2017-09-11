<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ForumTest extends TestCase
{
    use DatabaseTransactions;
    
    protected $thread;
    
    public function setUp()
    {
        parent::setUp();

        $this->forum = create('App\Models\Forum');   
    }
    
    public function test_forum_has_threads()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->forum->threads);
    }

    public function test_a_forum_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->forum->user);
    }

    public function test_a_forum_has_a_parent()
    {
        $result = false;
        if(($this->forum->parent == null) || (get_class($this->forum->parent) == 'App\Models\Forum')) {
            $result = true;
        }

        $this->assertTrue($result);
    }

    public function test_a_forum_can_add_a_thread()
    {
        $this->forum->addThread([
            'creator_id' => 1,
            'user_id' => 1,
            'title' => 'Foobar',
            'slug' => 'foobar',
            'body' => 'Hello world.',
        ]);

        $this->assertCount(1, $this->forum->threads);
    }

    public function test_a_forum_can_make_a_sting_path()
    {
        $this->assertEquals('/forums/' . $this->forum->slug, $this->forum->path());
    }

}