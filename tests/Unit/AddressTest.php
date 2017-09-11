<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddressTest extends TestCase
{
    use Databasetransactions;

    protected $address;
    
    public function setUp()
    {
        parent::setUp();

        $this->address = create('App\Models\Address');
    }

    public function test_an_address_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->address->creator);
    }

    public function test_an_address_has_a_resource()
    {
        $this->assertInstanceOf($this->address->resource_type, $this->address->resource);
    }

    public function test_a_addres_has_a_region()
    {
        $this->assertInstanceOf('App\Models\Region', $this->address->region);
    }

    public function test_a_addres_has_a_country()
    {
        $this->assertInstanceOf('App\Models\Country', $this->address->country);
    }
    
}