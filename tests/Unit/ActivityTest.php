<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Activity;

class ActivityTest extends TestCase
{
    use Databasetransactions;

    protected $activity;
    
    public function setUp()
    {
        parent::setUp();

        $this->activity = create('App\Models\Activity');
    }

    public function test_an_activity_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->activity->user);
    }

    //public function test_an_activity_has_a_resource()
    //{
    //    $this->assertInstanceOf($this->activity->resource_type, get_class($this->activity->resource));
    //}
       
    public function test_records_activity_when_a_thread_is_created()
    {
        $this->signIn();
        
        $thread = create('App\Models\Thread', ['user_id' => auth()->id()]);

        $a = [
            'user_id' => auth()->id(),
            'action' => 'threads.created',
            'resource_id' => $thread->id,
            'resource_type' => get_class($thread),
        ];
        
        $this->assertDatabaseHas('activities', $a);

        $activity = Activity::where($a)->firstOrFail();
        $this->assertEquals($activity->resource->id, $thread->id);
    }

    public function test_records_activity_when_created()
    {
        $this->signIn();
        
        $forum = create('App\Models\Forum', ['user_id' => auth()->id()]);
        $thread = create('App\Models\Thread', ['user_id' => auth()->id(), 'forum_id' => $forum->id]);
        $reply = create('App\Models\Reply', ['user_id' => auth()->id(), 'resource_id' => $thread->id, 'resource_type' => get_class($thread)]);
        
        $this->assertDatabaseHas('activities', [
            'user_id' => auth()->id(),
            'action' => 'replies.created',
            'resource_id' => $reply->id,
            'resource_type' => get_class($reply),
        ]);
        
        $this->assertDatabaseHas('activities', [
            'user_id' => auth()->id(),
            'action' => 'threads.created',
            'resource_id' => $thread->id,
            'resource_type' => get_class($thread),
        ]);

        $this->assertDatabaseHas('activities', [
            'user_id' => auth()->id(),
            'action' => 'forums.created',
            'resource_id' => $forum->id,
            'resource_type' => get_class($forum),
        ]);
    }

    public function test_provides_user_feed()
    {
        $this->signIn();

        create('App\Models\Thread', [
            'user_id' => auth()->id()
        ], 2);

        $ffa = auth()->user()->activities()->where('resource_type', 'App\Models\Forum')->first();
        $fta = auth()->user()->activities()->where('resource_type', 'App\Models\Thread')->first();
        $mw = \Carbon\Carbon::now()->subWeek();
        $ffa->created_at = $mw;
        $ffa->updated_at = $mw;
        $ffa->save();
        $fta->created_at = $mw;
        $fta->updated_at = $mw;
        $fta->save();
        
        $feed = Activity::feed(auth()->user());

        $this->assertTrue($feed->keys()->contains(\Carbon\Carbon::now()->format('Y-m-d')));
        $this->assertTrue($feed->keys()->contains(\Carbon\Carbon::now()->subWeek()->format('Y-m-d')));
    }

}