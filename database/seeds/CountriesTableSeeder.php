<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    public function run()
    {
        $usCountry = factory('App\Models\Country')->create([
            'creator_id' => 1,
            'name' => 'United States',
            'slug' => 'united-states',
            'abbr' => 'USA',
            'description' => 'United States of America',
        ]);
    }
}