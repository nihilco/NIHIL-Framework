<?php

namespace Tests\Feature;

use Tests\TestCase;

class PrioritiesControllerTest extends TestCase
{
    protected $priority;
    
    public function setUp()
    {
        parent::setUp();

        $this->priority = create('App\Models\Priority');
    }

}