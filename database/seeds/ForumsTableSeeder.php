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
        $mainForum = factory('App\Models\Forum')->create([
            'parent_id' => null,
            'user_id' => 1,
            'title' => 'Main',
            'slug' => 'main',
            'description' => 'Main Forums',
        ]);

        $supportForum = factory('App\Models\Forum')->create([
            'parent_id' => null,
            'user_id' => 1,
            'title' => 'Support',
            'slug' => 'support',
            'description' => 'Support Forums',
        ]);

        $offtopicForum = factory('App\Models\Forum')->create([
            'parent_id' => null,
            'user_id' => 1,
            'title' => 'Off-Topic',
            'slug' => 'off-topic',
            'description' => 'Off-Topic Forums',
        ]);

        $announcementsForum = factory('App\Models\Forum')->create([
            'parent_id' => $mainForum->id,
            'user_id' => 1,
            'title' => 'Announcements',
            'slug' => 'announcements',
            'description' => 'Main Announcements Forums',
        ]);

        $updatesForum = factory('App\Models\Forum')->create([
            'parent_id' => $mainForum->id,
            'user_id' => 1,
            'title' => 'Updates',
            'slug' => 'updates',
            'description' => 'Main Updates Forums',
        ]);

        $qaForum = factory('App\Models\Forum')->create([
            'parent_id' => $supportForum->id,
            'user_id' => 1,
            'title' => 'Questions & Answers',
            'slug' => 'questions-and-answers',
            'description' => 'Support Questions & Answers Forums',
        ]);

        $version001Thread = factory('App\Models\Thread')->create([
            'forum_id' => $updatesForum->id,
            'user_id' => 1,
            'title' => 'Version 0.0.1',
            'slug' => 'version-0-0-1',
            'body' => 'Version 0.0.1 description.',
        ]);

        $version002Thread = factory('App\Models\Thread')->create([
            'forum_id' => $updatesForum->id,
            'user_id' => 1,
            'title' => 'Version 0.0.2',
            'slug' => 'version-0-0-2',
            'body' => 'Version 0.0.2 description.',
        ]);

        $version003Thread = factory('App\Models\Thread')->create([
            'forum_id' => $updatesForum->id,
            'user_id' => 1,
            'title' => 'Version 0.0.3',
            'slug' => 'version-0-0-3',
            'body' => 'Version 0.0.3 description.',
        ]);
    }

    protected function createLorem()
    {
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
