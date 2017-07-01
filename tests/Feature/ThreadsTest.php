<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadsTest extends TestCase
{
    use DatabaseTransactions;

    protected $forum;
    protected $thread;
    
    public function setUp()
    {
        parent::setUp();
        
        $this->forum = create('App\Models\Forum');
        $this->thread = create('App\Models\Thread', ['forum_id' => $this->forum->id]);
    }

    public function publishThread($overrides = [])
    {
        $this->signIn();

        $overrides['forum_id'] = $this->forum->id;
        
        $newThread = make('App\Models\Thread', $overrides);

        \Session::start();
        $a = array_merge($newThread->toArray(), ['_token' => csrf_token()]);
        
        return $this->post($this->forum->path() . '/threads', $a);
    }
    
    public function test_a_guest_can_view_threads()
    {
        $response = $this->get($this->forum->path());
        $response->assertStatus(200);
        $response->assertSee($this->thread->title);
    }

    public function test_a_guest_can_view_specific_thread()
    {
        $response = $this->get($this->thread->path());
        $response->assertStatus(200);
        $response->assertSee($this->thread->title);
    }

    public function test_a_guest_can_read_replies_associated_with_a_thread()
    {
        $reply = create('App\Models\Reply', ['thread_id' => $this->thread->id]);

        $response = $this->get($this->thread->path());
        $response->assertSee($reply->body);
    }

    public function test_a_user_can_create_a_new_thread()
    {
        $this->signIn();

        $newThread = make('App\Models\Thread');

        \Session::start();
        $a = array_merge($newThread->toArray(), ['_token' => csrf_token()]);
        $this->post($this->forum->path() . '/threads', $a);

        $response = $this->get($this->forum->path());

        $response->assertSee($this->thread->title);
    }

    public function test_a_guest_cannot_create_a_new_thread()
    {
        $newThread = make('App\Models\Thread');

        \Session::start();
        $a = array_merge($newThread->toArray(), ['_token' => csrf_token()]);
        $response = $this->post($this->forum->path() . '/threads', $a);
        $response->assertRedirect('/login');
    }

    public function test_a_guest_cannot_view_thread_create_page()
    {
        $this->get($this->forum->path() . '/threads/create')
             ->assertRedirect('/login');
    }

    public function test_a_user_can_view_thread_create_page()
    {
        $this->signIn();

        $response = $this->get($this->forum->path() . '/threads/create');
        $response->assertStatus(200);
    }

    public function test_a_thread_requires_a_title()
    {
        $this->publishThread(['title' => null])
             ->assertSessionHasErrors('title');
    }

    public function test_a_thread_requires_a_slug()
    {
        $this->publishThread(['slug' => null])
             ->assertSessionHasErrors('slug');
    }

    public function test_a_thread_requires_a_body()
    {
        $this->publishThread(['body' => null])
             ->assertSessionHasErrors('body');
    }

    public function test_threads_are_grouped_by_forum()
    {
        $newForum = create('App\Models\Forum');
        $newThreadInForum = create('App\Models\Thread', ['forum_id' => $newForum->id]);
        $newThreadNotInForum = create('App\Models\Thread');

        $response = $this->get($newForum->path());
        $response->assertSee($newThreadInForum->title);
        $response->assertDontSee($newThreadNotInForum->title);   
    }

    public function test_a_user_can_filter_threads_by_username()
    {
        $this->signIn('App\User', ['username' => 'jdoe']);

        $threadByJohn = create('App\Models\Thread', ['user_id' => auth()->id()]);
        $threadNotByJohn = create('App\Models\Thread');

        $this->get('/forums/threads?username=jdoe')
             ->assertSee($threadByJohn->title)
             ->assertDontSee($threadNotByJohn->title);
    }

    public function test_a_user_can_filter_threads_by_reply_count()
    {
        $threadWithTwentySevenReplies = create('App\Models\Thread');
        create('App\Models\Reply', ['thread_id' => $threadWithTwentySevenReplies->id], 27);

        $threadWithTwentyEightReplies = create('App\Models\Thread');
        create('App\Models\Reply', ['thread_id' => $threadWithTwentyEightReplies->id], 28);

        $threadWithTwentySixReplies = create('App\Models\Thread');
        create('App\Models\Reply', ['thread_id' => $threadWithTwentySixReplies->id], 26);
        
        $response = $this->getJson('/forums/threads?replies=1')->json();
        $c = count($response);
        for($i = 0; $i < $c; $i++) {
            if($i > 2) {
                unset($response[$i]);
            }
        }

        $this->assertEquals(['28', '27', '26'], array_column($response, 'replies_count'));
    }

    public function test_a_guest_cannot_delete_threads()
    {
        $newThread = create('App\Models\Thread');
               
        \Session::start();
        $response = $this->delete($newThread->path(), ['_token' => csrf_token()]);

        $response->assertRedirect('/login');
    }

    public function test_a_user_cannot_delete_another_users_threads()
    {
        $this->signIn();

        $newThread = create('App\Models\Thread');
               
        \Session::start();
        $response = $this->delete($newThread->path(), ['_token' => csrf_token()]);

        $response->assertStatus(403);
    }

    public function test_threads_may_only_be_deleted_by_those_who_have_permission()
    {
        
    }

    public function test_a_thread_can_be_deleted()
    {
        $this->signIn();

        $newThread = create('App\Models\Thread', ['user_id' => auth()->id()]);
        $newReply = create('App\Models\Reply', ['thread_id' => $newThread->id]);
        $newThreadVote = create('App\Models\Vote', ['resource_id' => $newThread->id, 'resource_type' => App\Models\Thread::class]);
        $newReplyVote = create('App\Models\Vote', ['resource_id' => $newReply->id, 'resource_type' => App\Models\Reply::class]);

        \Session::start();
        $response = $this->json('DELETE', $newThread->path(), ['_token' => csrf_token()]);

        $response->assertStatus(204);
        $this->assertSoftDeleted('forums_threads', ['id' => $newThread->id]);
        $this->assertSoftDeleted('forums_replies', ['id' => $newReply->id]);
        $this->assertSoftDeleted('forums_votes', ['id' => $newThreadVote->id]);
        $this->assertSoftDeleted('forums_votes', ['id' => $newReplyVote->id]);
    }

}