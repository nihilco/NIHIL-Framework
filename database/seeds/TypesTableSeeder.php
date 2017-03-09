<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert([
            [
                'parent_id' => null,
                'name' => 'Bug',
                'slug' => 'bug',
                'description' => 'This is an issue which impairs or prevents the function of the product.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'name' => 'Improvement',
                'slug' => 'improvement',
                'description' => 'This could be an improvement or enhancement to an existing feature or task.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'name' => 'Epic Story',
                'slug' => 'epic-story',
                'description' => 'This issue is too big and elaborate to handle as is; it needs to be broken down into individual parts.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'name' => 'Story',
                'slug' => 'story',
                'description' => 'This is an issue where there are a distinct order, or collection, of events which lead to a particular problem.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'name' => 'Task',
                'slug' => 'task',
                'description' => 'Action that needs to be performed or executed not necessarily to fix a problem, but more to better a piece of the whole.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'name' => 'Technical',
                'slug' => 'technical',
                'description' => 'A technical task.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'parent_id' => null,
                'name' => 'New Feature',
                'slug' => 'new-feature',
                'description' => 'Take this idea and run with it; we want something completely new here.',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],

        ]);
    }
}
