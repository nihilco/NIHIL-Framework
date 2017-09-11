<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RatingTest extends TestCase
{
    use Databasetransactions;

    protected $rating;
    
    public function setUp()
    {
        parent::setUp();

        $this->rating = create('App\Models\Rating');
    }

    public function test_a_rating_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->rating->creator);
    }

    public function test_a_rating_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->rating->user);
    }

    public function test_a_rating_has_a_resource()
    {
        $this->assertInstanceOf($this->rating->resource_type, $this->rating->resource);
    }
    
}