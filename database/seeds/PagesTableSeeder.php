<?php

use Illuminate\Database\Seeder;
//use App\Services\Purifier;

class PagesTableSeeder extends Seeder
{
    
    public function run()
    {
        //$purifier = new Purifier();
        
        $kitchenSinkPage = factory('App\Models\Page')->create([
            'creator_id' => 1,
            'title' => 'Kitchen Sink',
            'slug' => 'kitchen-sink',
            'description' => 'The Kitchen Sink page will show you what all the differnet HTML elements look like in the current theme.',
            //'content' => $purifier->clean(include('kitchen-sink.php')),
            'content' => htmlspecialchars(include('kitchen-sink.php')),
        ]);
    }
}