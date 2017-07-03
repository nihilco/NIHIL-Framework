<?php

namespace Tests\Feature;

use Tests\TestCase;

class ResolutionsControllerTest extends TestCase
{
    protected $resolution;
    
    public function setUp()
    {
        parent::setUp();

        $this->resolution = create('App\Models\Resolution');
    }

}