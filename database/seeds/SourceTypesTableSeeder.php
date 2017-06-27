<?php

use Illuminate\Database\Seeder;

class SourceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('source_types')->insert([
            'name' => 'Stripe Account',
            'description' => '',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
        DB::table('source_types')->insert([
            'name' => 'Bank Account',
            'description' => '',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('source_types')->insert([
            'name' => 'Credit Card',
            'description' => '',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
        DB::table('source_types')->insert([
            'name' => 'Bitcoin',
            'description' => '',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
        DB::table('source_types')->insert([
            'name' => 'Check',
            'description' => '',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('source_types')->insert([
            'name' => 'Cash',
            'description' => '',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
