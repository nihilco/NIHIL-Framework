<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('statuses')->insert([
            [
                'user_id' => 1,
                'name' => 'New',
                'slug' => 'new',
                'description' => 'This is a newly reported issue and is awaiting processing and assignment.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'name' => 'Fixed',
                'slug' => 'fixed',
                'description' => 'Action has been taken to correct this issue which is awaiting reporter verification.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'name' => 'In Progress',
                'slug' => 'in-progress',
                'description' => 'The issue is actively being worked on.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'name' => 'Reopened',
                'slug' => 'reopened',
                'description' => 'If a previous resolution fails, the issue is reassigned and reopened.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'name' => 'Open',
                'slug' => 'open',
                'description' => 'The issue has been assigned, opened, and is ready for the assignee to start work.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'name' => 'Closed',
                'slug' => 'closed',
                'description' => 'This issue is considered finished; the resolution is correct.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
