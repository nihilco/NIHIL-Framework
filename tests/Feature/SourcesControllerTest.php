<?php

namespace Tests\Feature;

use Tests\TestCase;

class SourcesControllerTest extends TestCase
{
    protected $source;
    
    public function setUp()
    {
        parent::setUp();

        $this->source = create('App\Models\Source');
    }

}