<?php

use Illuminate\Database\Seeder;

class TrippersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('trippers')->insert([
            'tripper_type_id' => 3,
            'trip_group_id' => null,
            'first_name' => 'Uriah',
            'last_name' => 'Clemmer',
            'arrives_at' => '2017-05-25 09:00:00',
            'departs_at' => '2017-06-01 13:00:00',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
