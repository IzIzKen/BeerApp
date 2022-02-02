<?php

namespace Database\Seeders;

use App\Models\Style;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StylesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');

        $file = fopen(storage_path('app/csvs/beerStyles.csv'), 'r');
        $insert_array = [];
        $flag = true;
        while($csv = fgetcsv($file)){
            if ($flag){
                $flag = false;
                continue;
            }
            $insert_array[] = [
//                'id' => $csv[0],
                'name' => $csv[1],
                'description' => $csv[2],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        fclose($file);

        Style::query()->insert($insert_array);
    }
}
