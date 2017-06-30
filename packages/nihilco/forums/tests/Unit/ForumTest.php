<?php

namespace NIHILCo\Forums\Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ForumTest extends TestCase
{
    use DatabaseTransactions;
    
    protected $thread;
    
    public function setUp()
    {
        parent::setUp();

        $this->forum = create('NIHILCo\Forums\Models\Forum');   
    }
    
    public function test_forum_has_threads()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->forum->threads);
    }

    public function test_a_forum_has_a_user()
    {
        $this->assertInstanceOf('App\User', $this->forum->user);
    }

    public function test_a_forum_can_add_a_thread()
    {
        $this->forum->addThread([
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