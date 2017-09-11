<?php

use Illuminate\Database\Seeder;

class ForumsSeeder extends Seeder
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
            'creator_id' => 1,
            'user_id' => 1,
            'title' => 'Main',
            'slug' => 'main',
            'description' => 'Main Forums',
        ]);

        $supportForum = factory('App\Models\Forum')->create([
            'parent_id' => null,
            'creator_id' => 1,
            'user_id' => 1,
            'title' => 'Support',
            'slug' => 'support',
            'description' => 'Support Forums',
        ]);

        $offtopicForum = factory('App\Models\Forum')->create([
            'parent_id' => null,
            'creator_id' => 1,
            'user_id' => 1,
            'title' => 'Off-Topic',
            'slug' => 'off-topic',
            'description' => 'Off-Topic Forums',
        ]);

        $announcementsForum = factory('App\Models\Forum')->create([
            'parent_id' => $mainForum->id,
            'creator_id' => 1,
            'user_id' => 1,
            'title' => 'Announcements',
            'slug' => 'announcements',
            'description' => 'Main Announcements Forums',
        ]);

        $updatesForum = factory('App\Models\Forum')->create([
            'parent_id' => $mainForum->id,
            'creator_id' => 1,
            'user_id' => 1,
            'title' => 'Updates',
            'slug' => 'updates',
            'description' => 'Main Updates Forums',
        ]);

        $qaForum = factory('App\Models\Forum')->create([
            'parent_id' => $supportForum->id,
            'creator_id' => 1,
            'user_id' => 1,
            'title' => 'Questions & Answers',
            'slug' => 'questions-and-answers',
            'description' => 'Support Questions & Answers Forums',
        ]);

        $version001Thread = factory('App\Models\Thread')->create([
            'forum_id' => $updatesForum->id,
            'creator_id' => 1,
            'user_id' => 1,
            'title' => 'Version 0.0.1',
            'slug' => 'version-0-0-1',
            'body' => 'Version 0.0.1 description.',
        ]);

        $version002Thread = factory('App\Models\Thread')->create([
            'forum_id' => $updatesForum->id,
            'creator_id' => 1,
            'user_id' => 1,
            'title' => 'Version 0.0.2',
            'slug' => 'version-0-0-2',
            'body' => 'Version 0.0.2 description.',
        ]);

        $version003Thread = factory('App\Models\Thread')->create([
            'forum_id' => $updatesForum->id,
            'creator_id' => 1,
            'user_id' => 1,
            'title' => 'Version 0.0.3',
            'slug' => 'version-0-0-3',
            'body' => 'Version 0.0.3 description.',
        ]);

        $whatdoyouwanttobeThread = factory('App\Models\Thread')->create([
            'forum_id' => $qaForum->id,
            'creator_id' => 1,
            'user_id' => 2,
            'title' => 'What Would You Be?',
            'slug' => 'life-goals-do-over-dream-big-ftw',
            'body' => 'I would honestly be a bounty hunter, assassin or hit-man. This would be exciting. I have played far too many video games and watched far too many movies. I wish that I could be the stay at home wife and be happy baking and shit but nah. Guns and Glory all the way.',
        ]);

        $ratatouillemomentThread = factory('App\Models\Thread')->create([
            'forum_id' => $qaForum->id,
            'creator_id' => 1,
            'user_id' => 2,
            'title' => 'Ratatouille Moment',
            'slug' => 'blast-from-the-past-memories-that-have-not-faded',
            'body' => 'I used to visit my Aunt Pat out in New Jersey and we would go to the pool. She would usually make these tuna fish sandwiches on white bread and after a good swim, we would eat them. We were always told to wait 30 mins before hopping back in the pool or else we would cramp up. Hell...I usually listened but the one time I did not...I did indeed, cramp up. When I am near a pool, I have a "Ratatouille" moment back to NJ and Tuna Fish Sandwiches and good memories. What was on the tuna sandwiches. Basic mayo and mayo onions and spices. Good Shit.',
        ]);

        $urmReply = factory('App\Models\Reply')->create([
            'creator_id' => 1,
            'user_id' => 1,
            'resource_id' => $whatdoyouwanttobeThread->id,
            'resource_type' => get_class($whatdoyouwanttobeThread),
            'content' => 'Id be a spy, not just any kind of spy, but the Jame Bond, double-oh kinda spy.'
        ]);

        $prmReply = factory('App\Models\Reply')->create([
            'creator_id' => 1,
            'user_id' => 2,
            'resource_id' => $whatdoyouwanttobeThread->id,
            'resource_type' => get_class($whatdoyouwanttobeThread),
            'content' => 'On the other hand...I am curious to know what it is like to be plain and normal if such a thing exists. I do not want any mental/mood disorders, dysfunctional family, etc. I also want to be a normal size. 4-10 isnt normal. Cute (to some) but not normal. I want plainness. Simplicity. Is the grass greener on the other side? I shall never know.'
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
