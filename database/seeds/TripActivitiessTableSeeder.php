<?php

use Illuminate\Database\Seeder;

class TripActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('trip_activities')->insert([
            'name' => 'Default',
            'description' => 'This is the default activity.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_activities')->insert([
            'name' => 'Canoeing',
            'description' => 'Canoeing activity.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_activities')->insert([
            'name' => 'Section III',
            'description' => 'Section III activity.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_activities')->insert([
            'name' => 'Section IV',
            'description' => 'Section IV activity.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_activities')->insert([
            'name' => 'Hiking',
            'description' => 'Hiking activity.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_activities')->insert([
            'name' => 'Climbing',
            'description' => 'Climbing activity.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_activities')->insert([
            'name' => 'Service',
            'description' => 'Service activity.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
