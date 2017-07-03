<?php

namespace Tests\Feature;

use Tests\TestCase;

class CountriesControllerTest extends TestCase
{
    protected $country;
    
    public function setUp()
    {
        parent::setUp();

        $this->country = create('App\Models\Country');
    }

}