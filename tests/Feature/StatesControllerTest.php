<?php

namespace Tests\Feature;

use Tests\TestCase;

class StatesControllerTest extends TestCase
{
    protected $state;
    
    public function setUp()
    {
        parent::setUp();

        $this->state = create('App\Models\State');
    }

}