<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FavoriteTest extends TestCase
{
    use Databasetransactions;

    protected $favorite;
    
    public function setUp()
    {
        parent::setUp();

        $this->favorite = create('App\Models\Favorite');
    }

    public function test_a_favorite_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->favorite->user);
    }

}