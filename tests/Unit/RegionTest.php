<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegionTest extends TestCase
{
    use Databasetransactions;

    protected $region;
    
    public function setUp()
    {
        parent::setUp();

        $this->region = create('App\Models\Region');
    }

    public function test_a_region_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->region->creator);
    }

    public function test_a_region_has_a_parent()
    {
        $result = false;
        if(($this->region->parent == null) || (get_class($this->region->parent) == 'App\Models\Region')) {
            $result = true;
        }

        $this->assertTrue($result);
    }

    public function test_a_region_has_a_country()
    {
        $this->assertInstanceOf('App\Models\Country', $this->region->country);
    }
    
}