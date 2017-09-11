<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThemeTest extends TestCase
{
    use Databasetransactions;

    protected $theme;
    
    public function setUp()
    {
        parent::setUp();

        $this->theme = create('App\Models\Theme');
    }

    public function test_a_theme_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->theme->creator);
    }
    
}