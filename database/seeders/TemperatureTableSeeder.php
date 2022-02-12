<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemperatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $temps = [
            'すごく寒い', '肌寒い', '快適', '少し暑い', '暑い'
        ];

        foreach ($temps as $temp) {
            $now = Carbon::now();
            DB::table('temperatures')->insert([
                'temp' => $temp,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
