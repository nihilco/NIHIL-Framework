<?php

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $nfTestAccount = factory('App\Models\Account')->create([
            'creator_id' => 1,
            'user_id' => 1,
            'mode' => 'test',
            'status' => 'active',
            'name' => 'The NIHIL Corporation',
            'stripe_id' => 'acct_15TgLZIK90Dq7VMQ',
            'publishable_key' => 'pk_test_oBG1UuDfekCXu72oDEOjRcqk',
            //'secret_key' => 'eyJpdiI6IkpYTTJPazBTQm90dUlHODlVSm9JdEE9PSIsInZhbHVlIjoiM3NYQlRvYklaZ0VHbzhuaFduelwvSHhXbllhYnF3SXhqZ3NxNXhWQmdNSjRhNUY0cmgwNlJKbWlwUDIzSHErV00iLCJtYWMiOiJjMmEyMDQzM2NmMzczOWI0ZDUxY2RjZjBmZGM1NWJiNDNkZDdlNDc0YjJmYTIyOTg1YTVkN2ZiZGE3YzdmYjNmIn0=',
            'secret_key' => \Crypt::encrypt(env('STRIPE_NIHIL_TEST_SECRET_KEY')),
            'api_version' => '2017-06-05',
            'description' => 'Test stand-alone account for The NIHIL Corporation.',
            'country_id' => 1,
            'managed' => false,
        ]);

        $nfLiveAccount = factory('App\Models\Account')->create([
            'creator_id' => 1,
            'user_id' => 1,
            'mode' => 'live',
            'status' => 'active',
            'name' => 'The NIHIL Corporation',
            'stripe_id' => 'acct_15TgLZIK90Dq7VMQ',
            'publishable_key' => 'pk_live_OarklrMISiJaFK0aS856tunw',
            //'secret_key' => 'eyJpdiI6IlltUjE4OGl5VU5TeTJCZ0twWTRacHc9PSIsInZhbHVlIjoiYnN3M2ozSzQxUkF1R05OOW52UFh2Q3dKazJnemM5TUxVYlQ0NklaN1ROeTZwKzYwK0UzQURyWU5QK2pFS1A4QSIsIm1hYyI6Ijc0MGMwNWQxZjNmZjM4MTBjY2I0YjhiOWY2MDg2NmM1MTA3MWE4ODUxN2NkMTdhM2I5MzUzM2RkMGU2YTdjMzYifQ==',
            'secret_key' => \Crypt::encrypt(env('STRIPE_NIHIL_LIVE_SECRET_KEY')),
            'api_version' => '2017-06-05',
            'description' => 'Live stand-alone account for The NIHIL Corporation.',
            'country_id' => 1,
            'managed' => false,
        ]);

        $taralokaLiveAccount = factory('App\Models\Account')->create([
            'creator_id' => 1,
            'user_id' => 1,
            'mode' => 'live',
            'status' => 'verified',
            'name' => 'The Taraloka Foundation',
            'stripe_id' => 'acct_17OfNeG8vwHYcmsJ',
            'publishable_key' => 'pk_live_5Ajxv2OfuP4njGrBoDsQBM9U',
            'secret_key' => 'eyJpdiI6IjJSM0ZxWGlGT0E0TW15MmkrTFpvNWc9PSIsInZhbHVlIjoiRitSVkFPY0hCbEFKRzgzQlVZQVwvaUdibXVzY3gzeGxSQW5Uc2lJNjZ5V05RMXVUTWZcL1J0NUJNUHpkekNXc1huIiwibWFjIjoiZjgzNThkN2JmNzZhYTg0ZTJkNGFiOWIxMjdhNjFiZTZmMzM2N2E5YTdjYTRlZWNlNjVmNThkZjQwYzhkN2U1NyJ9',
            'api_version' => '2017-06-05',
            'description' => 'Live managed account for The Taraloka Foundation.',
            'country_id' => 1,
            'managed' => true,
        ]);

        //Account::createStripeAccount([
        //    'creator_id' => 1,
        //    'user_id' => 1,
        //    'mode' => 'test',
        //    'status' => 'new',
        //    'name' => 'The Taraloka Foundation',
        //    'api_version' => '2017-06-05',
        //    'description' => 'Test managed account for The Taraloka Foundation.',
        //    'country_id' => 1,
        //    'managed' => true,
        //   'email' => 'uriah@taraloak.org',
        //    'url' => 'https://taraloka.org',
        //]);

        $c2cLiveAccount = factory('App\Models\Account')->create([
            'creator_id' => 1,
            'user_id' => 1,
            'mode' => 'live',
            'status' => 'pending',
            'name' => 'Blue Springs Historical Association',
            'stripe_id' => 'acct_1AIGdvJ86jnKJ2ap',
            'publishable_key' => 'pk_live_FQzwM3gVP2WcgcGsMjJinNhm',
            'secret_key' => 'eyJpdiI6Im4zNnpsRCtVdlkyTkVSK1ZGUUFJMlE9PSIsInZhbHVlIjoicllBVitMbWFUREZ6dkZcL0Z4UG1Vd2ExMFwvYTdBdVB0eXZKWm9qVTNaV3FUSTBoM2hMdlNtYStzTmsxMVNIMVdXIiwibWFjIjoiMGYzZTY2OWQyOWM0NGY3YzBlYzkyYmVjNTQwNmJjYjE0YTNkMDY2MzYwMmMwOGEzNTBlZDFlN2UyODM5ZmE5YyJ9',
            'api_version' => '2017-06-05',
            'description' => 'Live managed account for The Coast-to-Coast College Fair.',
            'country_id' => 1,
            'managed' => true,
        ]);
    }
}
