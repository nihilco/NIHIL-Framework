<?php

namespace Tests\Feature;

use Tests\TestCase;

class PostsControllerTest extends TestCase
{
    protected $post;
    
    public function setUp()
    {
        parent::setUp();

        $this->post = create('App\Models\Post');
    }
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_posts_controller_routes()
    {
        // User not logged in, show to public
        //$response = $this->get('/blog');
        //$response->assertStatus(200);

        // User not logged in, redirect to login
        //$response = $this->get('/posts/create');
        //$response->assertStatus(302);

        //
        //$reponse = $this->get('/posts');
        //$response->assertStatus(302);
    }
}
