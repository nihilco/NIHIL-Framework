<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Customer;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $uclemmerUser = factory('App\Models\User')->create([
            'name' => env('DB_SEED_USER_NAME'),
            'username' => env('DB_SEED_USER_USERNAME'),
            'email' => env('DB_SEED_USER_EMAIL'),
            'password' => bcrypt(env('DB_SEED_USER_PASSWORD')),
            'tos_acceptance_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Customer::createStripeCustomer($uclemmerUser);

        //
        $pvillaUser = factory('App\Models\User')->create([
            'name' => 'Phylicia Villa',
            'username' => 'Entity0fLight',
            'email' => 'Villa.Phyliciar@gmail.com',
            'password' => '$2y$10$Xbobc709MTIS/Gb1wkv1N.WDifZfMLSSmm74cdxqTp5Ed7GE2hjTq',
            'tos_acceptance_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Customer::createStripeCustomer($pvillaUser);

        //
        $mclemmerUser = factory('App\Models\User')->create([
            'name' => 'Matt Clemmer',
            'username' => 'mclemmer',
            'email' => 'mclemmer@gmail.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        Customer::createStripeCustomer($mclemmerUser);

        //
        $bhollerbachUser = factory('App\Models\User')->create([
            'name' => 'Ben Hollerbach',
            'username' => 'bhollerbach',
            'email' => 'ben.hollerbach@gmail.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        Customer::createStripeCustomer($bhollerbachUser);

        //
        $cschowUser = factory('App\Models\User')->create([
            'name' => 'Carl Schow',
            'username' => 'cschow',
            'email' => 'carl@antiquarians.co',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        Customer::createStripeCustomer($cschowUser);

        //
        $cgaryUser = factory('App\Models\User')->create([
            'name' => 'Chad Gary',
            'username' => 'cgary',
            'email' => 'chad@ternionathletics.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        Customer::createStripeCustomer($cgaryUser);

        //
        $ataylorUser = factory('App\Models\User')->create([
            'name' => 'Ann Katherine Taylor',
            'username' => 'ataylor',
            'email' => 'ataylor@baylorschool.org',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        Customer::createStripeCustomer($ataylorUser);

        //
        $wwilliamsUser = factory('App\Models\User')->create([
            'name' => 'Wray Williams',
            'username' => 'wwilliams',
            'email' => 'wray@caseantiques.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        Customer::createStripeCustomer($wwilliamsUser);

        //
        $szhangUser = factory('App\Models\User')->create([
            'name' => 'Sean Zhang',
            'username' => 'szhang',
            'email' => 'seanshikunzhang@gmail.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $nbracketUser = factory('App\Models\User')->create([
            'name' => 'Nat Bracket',
            'username' => 'nbracket',
            'email' => 'natbrack3@gmail.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $cserodinoUser = factory('App\Models\User')->create([
            'name' => 'Catherine Serodino',
            'username' => 'cserodino',
            'email' => 'catherineserodino@yahoo.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $bjcampUser = factory('App\Models\User')->create([
            'name' => 'BJ Camp',
            'username' => 'bjcamp',
            'email' => 'campbjt0@Sewanee.edu',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $beamUser = factory('App\Models\User')->create([
            'name' => 'Beam',
            'username' => 'beam',
            'email' => 'beam831@gmail.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $dbaUser = factory('App\Models\User')->create([
            'name' => 'Daxton B',
            'username' => 'dba',
            'email' => 'daxton@rockcreek.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $elopezUser = factory('App\Models\User')->create([
            'name' => 'E Lopez',
            'username' => 'elopez',
            'email' => 'lopezej0@sewanee.edu',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $rcampomanesUser = factory('App\Models\User')->create([
            'name' => 'Rebecca Campomanes',
            'username' => 'rcampomanes',
            'email' => 'Rebecca.campomanes@gmail.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $aarwoodUser = factory('App\Models\User')->create([
            'name' => 'Ann Arwood',
            'username' => 'aarwood',
            'email' => 'annrarwood@gmail.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $jcaldwellUser = factory('App\Models\User')->create([
            'name' => 'Jimmy Caldwell',
            'username' => 'jcaldwell',
            'email' => 'jlcaldwell132@gmail.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $sskaffUser = factory('App\Models\User')->create([
            'name' => 'Sarah Skaff',
            'username' => 'sskaff',
            'email' => 'sbskaff@yahoo.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $awarrenUser = factory('App\Models\User')->create([
            'name' => 'Asel Warren',
            'username' => 'awarren',
            'email' => 'asel.warren@gmail.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $tneuhoffUser = factory('App\Models\User')->create([
            'name' => 'Trevor Neuhoff',
            'username' => 'tneuhoff',
            'email' => 'trevor.neuhoff@gmail.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $abaxterUser = factory('App\Models\User')->create([
            'name' => 'A Baxter',
            'username' => 'abaxter',
            'email' => 'awbax@hotmail.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $kfreemanUser = factory('App\Models\User')->create([
            'name' => 'Katharine Freeman',
            'username' => 'kfreeman',
            'email' => 'katharine89@aol.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $cclemmerUser = factory('App\Models\User')->create([
            'name' => 'Chris Clemmer',
            'username' => 'cclemmer',
            'email' => 'caclemmer@gmail.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $mhettichUser = factory('App\Models\User')->create([
            'name' => 'M Hettich',
            'username' => 'mhettich',
            'email' => 'hettich56@yahoo.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $ebunchUser = factory('App\Models\User')->create([
            'name' => 'E Bunch',
            'username' => 'ebunch',
            'email' => 'eebunch@gmail.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

        //
        $ksmithUser = factory('App\Models\User')->create([
            'name' => 'Kayce Smith',
            'username' => 'ksmith',
            'email' => 'kayce23smith@yahoo.com',
            'password' => null,
            'tos_acceptance_at' => null,
        ]);

    }
}
