<?php

use Illuminate\Database\Seeder;

class ForumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $usersBefore = App\Models\User::all();
        factory('App\Models\User', (50 - $usersBefore->count()))->create();
        
        for($i = 1; $i <= 5; $i++) {
            factory('App\Models\Forum')->create(['user_id' => rand(1,50)]);
        }

        $forums = App\Models\Forum::all();

        foreach($forums as $forum) {
            for($j = 1; $j <= rand(8,15); $j++) {
                $thread = factory('App\Models\Thread')
                    ->create([
                        'forum_id' => $forum->id,
                        'user_id' => rand(1,50)
                    ]);
                for($k = 1; $k <= rand(10,20); $k++) {
                    factory('App\Models\Reply')
                        ->create([
                            'resource_id' => $thread->id,
                            'resource_type' => get_class($thread),
                            'user_id' => rand(1,50),
                        ]);
                }
                $thread->save();
            }
            $forum->save();
        }
    }
}
