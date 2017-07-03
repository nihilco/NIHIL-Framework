<?php

namespace Tests\Feature;

use Tests\TestCase;

class FavoritesControllerTest extends TestCase
{
    protected $favorite;
    
    public function setUp()
    {
        parent::setUp();

        $this->favorite = create('App\Models\Favorite');
    }

}