<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AccountsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(ResolutionsTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(PrioritiesTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        //
        $this->call(BillingSeeder::class);
        //
        $this->call(LibrarySeeder::class);
        //
        $this->call(ForumsSeeder::class);
        //
        $this->call(StripeDataSeeder::class);
    }
}
