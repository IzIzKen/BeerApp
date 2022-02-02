<?php

namespace Database\Seeders;

use App\Models\Brewery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Faker\Factory as Faker;

class BreweriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');
//        Brewery::factory()->count(30)->create();

        $file = fopen(storage_path('app/csvs/brewery.csv'), 'r');
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
                'address' => $csv[3],
                'tel' => $csv[4],
                'web' => $csv[5],
                'description' => $csv[6],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        fclose($file);

        Brewery::query()->insert($insert_array);
    }
}
