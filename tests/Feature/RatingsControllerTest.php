<?php

namespace Tests\Feature;

use Tests\TestCase;

class RatingsControllerTest extends TestCase
{
    protected $rating;
    
    public function setUp()
    {
        parent::setUp();

        $this->rating = create('App\Models\Rating');
    }

}