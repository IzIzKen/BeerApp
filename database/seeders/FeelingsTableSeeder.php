<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FeelingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feelings = [
            'キレがある', 'スッキリ', '苦みが強い', '爽やか', 'ジューシー', '華やかな香り', 'とりあえず', '酸っぱい', '飲み応えあり', 'ゴクゴク飲みたい', '熟成系', 'ハイアルコール', '旨味が強い', 'じっくり飲みたい', 'コーヒーが好き', '〆の一杯', 'クセが強い'
        ];

        foreach ($feelings as $feeling) {
            $now = Carbon::now();
            DB::table('feelings')->insert([
                'name' => $feeling,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
