<?php

namespace Tests\Feature;

use Tests\TestCase;

class LinksControllerTest extends TestCase
{
    protected $link;
    
    public function setUp()
    {
        parent::setUp();

        $this->link = create('App\Models\Link');
    }

}