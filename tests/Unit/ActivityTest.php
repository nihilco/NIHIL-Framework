<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Activity;

class ActivityTest extends TestCase
{
    use Databasetransactions;

    public function setUp()
    {
        parent::setUp();
    }
    
    public function test_records_activity_when_a_thread_is_created()
    {
        $this->signIn();
        
        $thread = create('App\Models\Thread', ['user_id' => auth()->id()]);

        $a = [
            'user_id' => auth()->id(),
            'action' => 'forums.threads.created',
            'subject_id' => $thread->id,
            'subject_type' => get_class($thread),
        ];
        
        $this->assertDatabaseHas('core_activities', $a);

        $activity = Activity::where($a)->firstOrFail();
        $this->assertEquals($activity->subject->id, $thread->id);
    }

    public function test_records_activity_when_created()
    {
        $this->signIn();
        
        $forum = create('App\Models\Forum', ['user_id' => auth()->id()]);
        $thread = create('App\Models\Thread', ['user_id' => auth()->id(), 'forum_id' => $forum->id]);
        $reply = create('App\Models\Reply', ['user_id' => auth()->id(), 'thread_id' => $thread->id]);
        
        $this->assertDatabaseHas('core_activities', [
            'user_id' => auth()->id(),
            'action' => 'forums.replies.created',
            'subject_id' => $reply->id,
            'subject_type' => get_class($reply),
        ]);
        
        $this->assertDatabaseHas('core_activities', [
            'user_id' => auth()->id(),
            'action' => 'forums.threads.created',
            'subject_id' => $thread->id,
            'subject_type' => get_class($thread),
        ]);

        $this->assertDatabaseHas('core_activities', [
            'user_id' => auth()->id(),
            'action' => 'forums.forums.created',
            'subject_id' => $forum->id,
            'subject_type' => get_class($forum),
        ]);
    }

}