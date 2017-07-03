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
        DB::table('currencies')->insert([
            'user_id' => 1,
            'name' => 'United States Dollar',
            'slug' => 'usd',
            'code' => 'USD',
            'sign' => '$',
            'description' => 'United States Dollar is the default currency',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
