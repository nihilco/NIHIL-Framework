<?php

namespace Tests\Feature;

use Tests\TestCase;

class PlansControllerTest extends TestCase
{
    protected $plan;
    
    public function setUp()
    {
        parent::setUp();

        $this->plan = create('App\Models\Plan');
    }

}