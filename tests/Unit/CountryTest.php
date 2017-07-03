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

    public function test_a_country_has_a_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->country->user);
    }
    
}