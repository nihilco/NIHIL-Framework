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
        $usersBefore = App\User::all();
        factory('App\User', (50 - $usersBefore->count()))->create();
        
        for($i = 1; $i <= 5; $i++) {
            factory('NIHILCo\Forums\Models\Forum')->create(['user_id' => rand(1,50)]);
        }

        $forums = NIHILCo\Forums\Models\Forum::all();

        foreach($forums as $forum) {
            for($j = 1; $j <= rand(8,15); $j++) {
                $thread = factory('NIHILCo\Forums\Models\Thread')
                    ->create([
                        'forum_id' => $forum->id,
                        'user_id' => rand(1,50)
                    ]);
                for($k = 1; $k <= rand(10,20); $k++) {
                    factory('NIHILCo\Forums\Models\Reply')
                        ->create([
                            'thread_id' => $thread->id,
                            'user_id' => rand(1,50),
                        ]);
                }
                $thread->save();
            }
            $forum->save();
        }
    }
}
