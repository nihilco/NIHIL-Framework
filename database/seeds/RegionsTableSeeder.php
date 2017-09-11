<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tn = factory('App\Models\Region')->create([
            'creator_id' => 1,
            'country_id' => 1,
            'name' => 'Tennessee',
            'abbr' => 'TN',
            'description' => 'Tennessee (TN) description.',
        ]);

        $ga = factory('App\Models\Region')->create([
            'creator_id' => 1,
            'country_id' => 1,
            'name' => 'Georgia',
            'abbr' => 'GA',
            'description' => 'Georgia (GA) description.',
        ]);

        $ky = factory('App\Models\Region')->create([
            'creator_id' => 1,
            'country_id' => 1,
            'name' => 'Kentucky',
            'abbr' => 'KY',
            'description' => 'Kentucky (KY) description.',
        ]);
    }
}
