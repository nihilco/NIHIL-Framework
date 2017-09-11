<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $usd = factory('App\Models\Currency')->create([
            'creator_id' => 1,
            'name' => 'United States Dollar',
            'slug' => 'usd',
            'code' => 'USD',
            'sign' => '$',
        ]);
    }
}
