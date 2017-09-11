<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    use Databasetransactions;

    protected $post;
    
    public function setUp()
    {
        parent::setUp();

        $this->post = create('App\Models\Post');
    }

    public function test_a_post_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->post->creator);
    }
    
}