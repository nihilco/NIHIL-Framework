<?php

use Illuminate\Database\Seeder;

class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('priorities')->insert([
            [
                'user_id' => 1,
                'name' => 'Critical',
                'slug' => 'critical',
                'description' => 'The issue blocks development and/or testing work; production could not run because of this critical error.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'name' => 'High',
                'slug' => 'high',
                'description' => 'The issue causes the system to crash, the loss of data, or severe memory leaks which makes it our highest priority.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'name' => 'Medium',
                'slug' => 'medium',
                'description' => 'The issue causes a major loss of function which, while it sounds bad, is usually only a medium priority.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'name' => 'Low',
                'slug' => 'low',
                'description' => 'The low priority issue causes a minor loss of function or presents another problem with an easy work around.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'name' => 'Trivial',
                'slug' => 'trivial',
                'description' => 'This issue is simply a cosmetic problem like a misspelled word or block misalignment - its trivial.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}