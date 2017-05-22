<?php

use Illuminate\Database\Seeder;

class TripperTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tripper_types')->insert([
            'name' => 'Default',
            'description' => 'Default tripper type.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tripper_types')->insert([
            'name' => 'Student',
            'description' => 'Senior tripper type.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tripper_types')->insert([
            'name' => 'Staff',
            'description' => 'Staff tripper type.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tripper_types')->insert([
            'parent_id' => 3,
            'name' => 'Administrator',
            'description' => 'Staff:Administrator tripper type',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tripper_types')->insert([
            'parent_id' => 3,
            'name' => 'Group Leader',
            'description' => 'Staff:Group Leader tripper type.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tripper_types')->insert([
            'parent_id' => 3,
            'name' => 'Climbing Staff',
            'description' => 'Staff:Climbing Staff tripper type.',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}
