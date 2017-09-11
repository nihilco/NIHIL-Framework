<?php

use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        //
        $dbaldacci = factory('App\Models\Author')->create([
            'creator_id' => 1,
            'first_name' => 'David',
            'last_name' => 'Baldacci',
        ]);

        $nbilton = factory('App\Models\Author')->create([
            'creator_id' => 1,
            'first_name' => 'Nick',
            'last_name' => 'Bilton',
        ]);

        $pvbrett = factory('App\Models\Author')->create([
            'creator_id' => 1,
            'first_name' => 'Peter',
            'middle_name' => 'V.',
            'last_name' => 'Brett',
        ]);
                
        $jbutcher = factory('App\Models\Author')->create([
            'creator_id' => 1,
            'first_name' => 'Jim',
            'last_name' => 'Butcher',
        ]);
        
        $lchild = factory('App\Models\Author')->create([
            'creator_id' => 1,
            'first_name' => 'Lincoln',
            'last_name' => 'Child',
        ]);

        $jdiamond = factory('App\Models\Author')->create([
            'creator_id' => 1,
            'first_name' => 'Jared',
            'last_name' => 'Diamond',
        ]);

        $jgrisham = factory('App\Models\Author')->create([
            'creator_id' => 1,
            'first_name' => 'John',
            'last_name' => 'Grisham',
        ]);

        $hlee = factory('App\Models\Author')->create([
            'creator_id' => 1,
            'first_name' => 'Harper',
            'last_name' => 'Lee',
        ]);

        $jrmoehringer = factory('App\Models\Author')->create([
            'creator_id' => 1,
            'first_name' => 'J.R.',
            'last_name' => 'Moehringer',
        ]);

        $gnix = factory('App\Models\Author')->create([
            'creator_id' => 1,
            'first_name' => 'Garth',
            'last_name' => 'Nix',
        ]);
        
        $dpreston = factory('App\Models\Author')->create([
            'creator_id' => 1,
            'first_name' => 'Douglas',
            'last_name' => 'Preston',
        ]);

        $bsanderson = factory('App\Models\Author')->create([
            'creator_id' => 1,
            'first_name' => 'Brandon',
            'last_name' => 'Sanderson',
        ]);

        $jpatterson = factory('App\Models\Author')->create([
            'creator_id' => 1,
            'first_name' => 'James',
            'last_name' => 'Patterson',
        ]);

        //
        // BOOKS
        //
        $b1 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Beyond the Ice Limit',
        ]);

        $b1->addAuthor($dpreston->id);
        $b1->addAuthor($lchild->id);

        $b2 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'The Obsidian Chamber',
        ]);

        $b2->addAuthor($dpreston->id);
        $b2->addAuthor($lchild->id);

        $b3 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Ghost Story',
        ]);

        $b3->addAuthor($jbutcher->id);

        $b4 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Cold Days',
        ]);

        $b4->addAuthor($jbutcher->id);

        $b5 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Arcanum Unbound',
        ]);

        $b5->addAuthor($bsanderson->id);

        $b6 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'To Hold the Bridge',
        ]);

        $b6->addAuthor($gnix->id);
        
        $b7 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Reliquary',
        ]);

        $b7->addAuthor($dpreston->id);
        $b7->addAuthor($lchild->id);

        $b8 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Skin Game',
        ]);

        $b8->addAuthor($jbutcher->id);

        $b9 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Sutton',
        ]);

        $b9->addAuthor($jrmoehringer->id);

        $b10 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'White Fire',
        ]);

        $b10->addAuthor($dpreston->id);
        $b10->addAuthor($lchild->id);

        $b11 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Blue Labyrinth',
        ]);

        $b11->addAuthor($dpreston->id);
        $b11->addAuthor($lchild->id);

        $b12 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Two Graves',
        ]);

        $b12->addAuthor($dpreston->id);
        $b12->addAuthor($lchild->id);

        $b13 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Cross the Line',
        ]);

        $b13->addAuthor($jpatterson->id);

        $b14 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'No Man\'s Land',
        ]);

        $b14->addAuthor($dbaldacci->id);

        $b15 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'The Guilty',
        ]);

        $b15->addAuthor($dbaldacci->id);

        $b16 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Daylight War',
        ]);

        $b16->addAuthor($pvbrett->id);

        $b17 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'The Escape',
        ]);

        $b17->addAuthor($dbaldacci->id);

        $b18 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Rogue Lawyer',
        ]);

        $b18->addAuthor($jgrisham->id);

        $b19 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Go Set A Watchman',
        ]);

        $b19->addAuthor($hlee->id);

        $b20 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Hatching Twitter',
        ]);

        $b20->addAuthor($nbilton->id);

        $b21 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Guns, Germs, and Steel',
        ]);

        $b21->addAuthor($jdiamond->id);

        $b22 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Turn Coat',
        ]);

        $b22->addAuthor($jbutcher->id);

        $b23 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'London Bridges',
        ]);

        $b23->addAuthor($jpatterson->id);

        $b24 = factory('App\Models\Book')->create([
            'creator_id' => 1,
            'title' => 'Sabriel',
        ]);

        $b24->addAuthor($gnix->id);
    }
}
