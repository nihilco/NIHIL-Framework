<?php

namespace Tests\Feature;

use Tests\TestCase;

class ActivitiesControllerTest extends TestCase
{
    protected $activity;
    
    public function setUp()
    {
        parent::setUp();

        $this->activity = create('App\Models\Activity');
    }

}