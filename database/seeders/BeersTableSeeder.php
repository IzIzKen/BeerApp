<?php

namespace Database\Seeders;

use App\Models\Beer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Faker\Factory as Faker;

class BeersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');
//        Beer::factory()->count(50)->create();

        $file = fopen(storage_path('app/csvs/beersDatabase.csv'), 'r');
        $insert_array = [];
        $flag = true;
        while($csv = fgetcsv($file)){
            if ($flag){
                $flag = false;
                continue;
            }
            $insert_array[] = [
                'id' => $csv[0],
                'brewery_id' => 1,
                'style_id' => 1,
                'name' => $csv[1],
                'price' => $faker->numberBetween(200, 1000),
                'alcohol' => $faker->numberBetween(1, 5),
//                'name_en' => $csv[2],
                'img_url' => $csv[3],
                'bitterness' => $faker->numberBetween(1, 5),
                'sweetness' => $faker->numberBetween(1, 5),
                'acidity' => $faker->numberBetween(1, 5),
                'deepness' => $faker->numberBetween(1, 5),
                'strength' => $faker->numberBetween(1, 5),
//                'evalution' => $csv[4],
//                'looks' => $csv[5],
//                'smell' => $csv[6],
//                'taste' => $csv[7],
//                'throat' => $csv[8],
//                'total' => $csv[9],
//                'abv' => $csv[11],
//                'ibu' => $csv[12],
//                'description' => $csv[14],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        fclose($file);

        Beer::query()->insert($insert_array);
    }
}
