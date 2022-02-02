<?php

namespace Database\Seeders;

use App\Models\beerFeeling;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BreweriesTableSeeder::class,
            StylesTableSeeder::class,
            FeelingsTableSeeder::class,
            BeersTableSeeder::class,
            beerFeelingTableSeeder::class,
        ]);
    }
}
