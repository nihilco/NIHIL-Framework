<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountryTest extends TestCase
{
    use Databasetransactions;

    protected $country;
    
    public function setUp()
    {
        parent::setUp();

        $this->country = create('App\Models\Country');
    }

    public function test_a_country_has_a_creator()
    {
        $this->assertInstanceOf('App\Models\User', $this->country->creator);
    }

    public function test_a_country_has_regions()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->country->regions);
    }
    
}