<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExceptionsControllerTest extends TestCase
{
    protected $exception;
    
    public function setUp()
    {
        parent::setUp();

        $this->exception = create('App\Models\Exception');
    }

}