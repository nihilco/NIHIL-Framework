<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SourceTest extends TestCase
{
    use Databasetransactions;

    protected $source;
    
    public function setUp()
    {
        parent::setUp();

        $this->source = create('App\Models\Source');
    }

    public function test_a_source_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->source->user);
    }
    
}