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

    public function test_a_source_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->source->creator);
    }

    public function test_a_source_has_an_account()
    {
        $this->assertInstanceOf('App\Models\Account', $this->source->account);
    }

    public function test_a_source_has_a_customer()
    {
        $this->assertInstanceOf('App\Models\Customer', $this->source->customer);
    }

    public function test_a_source_has_a_type()
    {
        $this->assertInstanceOf('App\Models\Type', $this->source->type);
    }
    
}