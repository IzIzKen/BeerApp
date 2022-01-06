<?php

namespace Database\Seeders;

use App\Models\beerFeeling;
use Illuminate\Database\Seeder;

class BeerFeelingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        beerFeeling::factory()->count(100)->create();
    }
}
