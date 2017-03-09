<?php

use Illuminate\Database\Seeder;

class ResolutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('resolutions')->insert([
            [
                'name' => 'Unresolved',
                'slug' => 'unresolved',
                'description' => 'No solution has been discovered for the issue at this time; this issue is unresolved.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Resolved',
                'slug' => 'resolved',
                'description' => 'This issue is resolved - a solution has been found for this issue.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Needs More Info',
                'slug' => 'needs-more-info',
                'description' => 'What is going on here?  We need more information to diagnose this issue.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Duplicate',
                'slug' => 'duplicate',
                'description' => 'This issue is a duplicate of a previously submitted issue.  Please refer back to the parent issue for more details.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
