<?php

namespace Tests\Feature;

use Tests\TestCase;

class ThemesControllerTest extends TestCase
{
    protected $theme;
    
    public function setUp()
    {
        parent::setUp();

        $this->theme = create('App\Models\Theme');
    }

}