<?php

namespace Tests\Feature;

use Tests\TestCase;

class StatusesControllerTest extends TestCase
{
    protected $status;
    
    public function setUp()
    {
        parent::setUp();

        $this->status = create('App\Models\Status');
    }

}