<?php

use Illuminate\Database\Seeder;

class TrippersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = '2017-05-25 09:00:00';
        $d = '2017-05-01 13:00:00';
        
        //
        DB::table('trippers')->insert([
            'trip_id' => 1,
            'tripper_type_id' => 3,
            'trip_group_id' => null,
            'first_name' => 'Uriah',
            'last_name' => 'Clemmer',
            'arrives_at' => $a,
            'departs_at' => $d,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        //
        $groups = [
            2 => [
                'Bryce Verble', 
                'Yiyang Xu', 
                'Matthew Boyer', 
                'John Mynatt', 
                'Tristan Benedict', 
                'Frank Bu', 
                'Sidon Kwon', 
                'Tyree Toliver', 
                'Tim Morton', 
                'Sims Pettway', 
                'Murphy McMahon', 
                'Conner Hill', 
                'Jack Best', 
            ],
            3 => [
                'Pierce Collins', 
                'Michael Monroe', 
                'Tristan Kyzer', 
                'Henry White', 
                'Andrew Bae', 
                'Sam Musick', 
                'Peter Lochmaier', 
                'Thomas Liang', 
                'Gunnar Ricketts', 
                'Tiger Yang', 
                'Sam Beard', 
                'Cam King', 
            ],
            4 => [
                'William Austin', 
                'Chase Roswall', 
                'Jaylen Church', 
                'Tekena Inyeinengi', 
                'James Shaughnessy', 
                'Dean Azzouz', 
                'Dallas Lockridge', 
                'Reagan Imsand', 
                'Gabriel Womble', 
                'Derek Duncan', 
                'Brandon Boyd', 
                'Patrick Curran', 
                'Charlie Glascock', 
                'Shaan Desai', 
            ],
            5 => [
                'Ethan Palisoc', 
                'Hunter Lane', 
                'David Thompson', 
                'AJ Lintunen', 
                'Baker Townsend', 
                'Will Turner', 
                'Sam Joyner', 
                'Charlie Collins', 
                'Aaron Ervin', 
                'Will Schatzman', 
                'Isaiah Strawter', 
                'Eman Williams', 
                'Cam Willis', 
                'Charlie Weeks', 
            ],
            6 => [
                'Pete Harinsuit', 
                'Cam Wolfe', 
                'Kalvin Watson', 
                'Talus Iorio-Ronek', 
                'Cooper Long', 
                'Spencer Peck', 
                'Niko Blanks', 
                'Khamari Whimper', 
                'Wilson Maclellan', 
                'Bennett Potluri', 
                'Luis Prada', 
            ],
            7 => [
                'Thomas Barringer', 
                'Connor McJunkin', 
                'Tate Prater', 
                'Gavin Roberson', 
                'Peter Ceren', 
                'John Golding', 
                'Cole Johnson', 
                'David Stultz', 
                'Edward ONeal', 
                'Alec Kadrie', 
                'Allen Pack', 
                'Holt Patton', 
                'Jason Green', 
                'Xander vonKlar', 
            ],
            8 => [
                'Cayley Quinn', 
                'Logan Hinch', 
                'Kamryn Bloh', 
                'Hails Burnette', 
                'Audrey Slye', 
                'Lauren Pritchett', 
                'Aubrey Catlett', 
                'Danielle Bates', 
                'Hayden Lowe', 
                'Rileigh Arrington', 
                'Grace Wardeberg', 
                'Tovalia Hume', 
                'Emma Kerley', 
            ],
            9 => [
                'Gabby Gray', 
                'Emma Buckley', 
                'Ellen Aho', 
                'Lizzie Thoni', 
                'Brooke Jenkins', 
                'Ellie Bixler', 
                'Erin Autenreith', 
                'Jane Wilson', 
                'Elan Watson', 
                'Cordelia Capps', 
                'Madison Mathis', 
                'Chandler Gentry', 
                'Paris Buckner', 
                'Naomi Wu', 
            ],
            10 => [
                'Lauren King', 
                'McLain Bender', 
                'Lilly Turner', 
                'Sydney Hait', 
                'Elliott Brakebill', 
                'Lauren Blalock', 
                'AJ Johnson', 
                'Kari Watson', 
                'Sherry Tang', 
                'Chapin Montague', 
                'Erin Dyke', 
                'Jamie Kessler', 
                'Katy Smith', 
                'Sydney Tindall', 
            ],
            11 => [
                'Neeley Hodge', 
                'Sarah Quinn', 
                'Shiloh Liu', 
                'Emma Flanagan', 
                'Haille Dinger', 
                'Angellea Saengthong', 
                'Elizabeth Cansler', 
                'Drew Hawkins', 
                'Anne Taylor', 
                'Sam Suer', 
                'Kamimila Bettelyoun', 
                'Makenna Avitabile', 
                'Ali Nettles', 
                'Briana Brady', 
                'Madison MacDonald', 
            ],
            12 => [
                'Mya-Grace Bevis', 
                'Sally Wilkerson', 
                'Erin Ray', 
                'Caroline Conner', 
                'Annie Dethero', 
                'Ashton Jenne', 
                'Isabelle Rowan', 
                'Haley Padilla', 
                'Payton Grande', 
                'Mary-Drue Hall', 
                'Page Wallace', 
                'Anna Silverblatt', 
                'Rose Huinker', 
                'Abbey Vernon', 
            ],
            13 => [
                'Margie Hussey', 
                'Diamond Wadley', 
                'Georgia Pugh', 
                'Leigh-Anne McKamey', 
                'Hailey Miller', 
                'Mattie Sienknecht', 
                'Whitley Smith', 
                'Alison Anderson', 
                'Lynn Jiang', 
                'Charis Boyd', 
                'Stott Heiskell', 
                'Hannah Williams', 
                'Sarah Sims', 
            ]
        ];

        foreach($groups as $i=>$group) {
            foreach($group as $tripper) {

                $name = explode(" ", $tripper);
                
                DB::table('trippers')->insert([
                    'trip_id' => 1,
                    'tripper_type_id' => 2,
                    'trip_group_id' => $i,
                    'first_name' => $name[0],
                    'last_name' => $name[1],
                    'arrives_at' => $a,
                    'departs_at' => $d,
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
