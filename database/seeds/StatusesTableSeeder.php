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
        $new = factory('App\Models\Status')->create([
            'creator_id' => 1,
            'name' => 'New',
            'slug' => 'new',
            'description' => 'This is a newly reported issue and is awaiting processing and assignment.',
        ]);

        $fixed = factory('App\Models\Status')->create([
            'creator_id' => 1,
            'name' => 'Fixed',
            'slug' => 'fixed',
            'description' => 'Action has been taken to correct this issue which is awaiting reporter verification.',
        ]);

        $inProgress = factory('App\Models\Status')->create([
            'creator_id' => 1,
            'name' => 'In Progress',
            'slug' => 'in-progress',
            'description' => 'The issue is actively being worked on.',
        ]);

        $reopened = factory('App\Models\Status')->create([
            'creator_id' => 1,
            'name' => 'Reopened',
            'slug' => 'reopened',
            'description' => 'If a previous resolution fails, the issue is reassigned and reopened.',
        ]);

        $open = factory('App\Models\Status')->create([
            'creator_id' => 1,
            'name' => 'Open',
            'slug' => 'open',
            'description' => 'The issue has been assigned, opened, and is ready for the assignee to start work.',
        ]);

        $closed = factory('App\Models\Status')->create([
            'creator_id' => 1,
            'name' => 'Closed',
            'slug' => 'closed',
            'description' => 'This issue is considered finished; the resolution is correct.',

        ]);
    }
}
