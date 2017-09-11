<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TagTest extends TestCase
{
    use Databasetransactions;

    protected $tag;
    
    public function setUp()
    {
        parent::setUp();

        $this->tag = create('App\Models\Tag');
    }

    public function test_a_tag_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->tag->creator);
    }
    
}