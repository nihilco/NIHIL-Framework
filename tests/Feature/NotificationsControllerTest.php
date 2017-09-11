<?php

namespace Tests\Feature;

use Tests\TestCase;

class NotificationsControllerTest extends TestCase
{
    protected $notification;
    
    public function setUp()
    {
        parent::setUp();

        $this->notification = create('App\Models\Notification');
    }

    public function test_notifications_controller_routes_entry()
    {
        // INDEX
        $response = $this->get('/notifications');
        $response->assertStatus(302);

        // SHOW 
        $response = $this->get($this->notification->path());
        $response->assertStatus(302);
        
        // CREATE  - User not logged in, redirect to login
        $response = $this->get('/notifications/create');
        $response->assertStatus(302);

        // UPDATE  - User not logged in, redirect to login
        $response = $this->post('/notifications');
        $response->assertStatus(302);

        // DELETE  - User not logged in, redirect to login
        $response = $this->delete($this->notification->path());
        $response->assertStatus(302);
    }

    public function test_notifications_for_replies_to_a_thread()
    {
        $this->signIn();

        $thread = create('App\Models\Thread')->follow();
        
        $thread->addReply(make('App\Models\Reply', [
            'user_id' => auth()->id(),
            'resource_id' => $thread->id,
            'resource_type' => get_class($thread)
        ])->toArray());

        $this->assertCount(0, auth()->user()->notifications);
        
        $r = $thread->addReply(make('App\Models\Reply', [
            'resource_id' => $thread->id,
            'resource_type' => get_class($thread)
        ])->toArray());
        
        $this->assertCount(1, auth()->user()->fresh()->notifications);
        
    }

    public function test_a_user_can_get_unread_notifications()
    {
        $this->signIn();

        $thread = create('App\Models\Thread')->follow();

        $r = $thread->addReply(make('App\Models\Reply', [
            'resource_id' => $thread->id,
            'resource_type' => get_class($thread)
        ])->toArray());

        $user = auth()->user();
        
        $response = $this->getJson('/users/{$user->username}/notifications')->json();
        
        $this->assertCount(1, $response);
    }

    public function test_a_user_can_read_notifications()
    {
        $this->signIn();

        $thread = create('App\Models\Thread')->follow();

        $r = $thread->addReply(make('App\Models\Reply', [
            'resource_id' => $thread->id,
            'resource_type' => get_class($thread)
        ])->toArray());
        
        $this->assertCount(1, auth()->user()->fresh()->unreadNotifications);

        $notification = auth()->user()->notifications->first();
        
        $response = $this->delete('/notifications/' . $notification->id);
        //dd($response);
        //dd([auth()->id(), (int) $notification->notifiable_id, $notification->notifiable_type]);
        $this->assertCount(0, auth()->user()->fresh()->unreadNotifications);
    }
}