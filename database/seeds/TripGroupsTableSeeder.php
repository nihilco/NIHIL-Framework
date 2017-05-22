<?php

use Illuminate\Database\Seeder;

class TripGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('trip_groups')->insert([
            'name' => 'Unassigned',
            'color' => 'black',
            'description' => 'Unassigned group.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_groups')->insert([
            'name' => 'Red',
            'color' => 'red',
            'description' => 'Red group.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_groups')->insert([
            'name' => 'Blue',
            'color' => 'blue',
            'description' => 'Blue group.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_groups')->insert([
            'name' => 'Grey',
            'color' => 'grey',
            'description' => 'Grey group.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_groups')->insert([
            'name' => 'Orange',
            'color' => 'orange',
            'description' => 'Ornage group.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_groups')->insert([
            'name' => 'Green',
            'color' => 'green',
            'description' => 'Green group.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_groups')->insert([
            'name' => 'Yellow',
            'color' => 'yellow',
            'description' => 'Yellow group.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_groups')->insert([
            'name' => 'Iris',
            'color' => 'lightblue',
            'description' => 'Iris group.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_groups')->insert([
            'name' => 'Flamingo',
            'color' => 'pink',
            'description' => 'Flamingo group.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_groups')->insert([
            'name' => 'Pistachio',
            'color' => 'lightgreen',
            'description' => 'Pistachio group.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_groups')->insert([
            'name' => 'Emerald',
            'color' => 'lawn',
            'description' => 'Emerald group.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_groups')->insert([
            'name' => 'Maroon',
            'color' => 'maroon',
            'description' => 'Maroon group.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('trip_groups')->insert([
            'name' => 'Purple',
            'color' => 'purple',
            'description' => 'Purple group.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
