<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StylesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $styles = [
            '白ビール', 'ランビック', 'ベルジャンエール', 'ペールエール', 'イングリッシュビター', 'スコティッシュエール', 'ブラウンエール',
            'ポーター', 'スタウト', 'ピルスナー', 'アメリカンラガー', 'ヨーロピアンラガー', 'ボック', 'アルト', 'フレンチエール', 'ジャーマンアンバーエール',
            'アメリカンスペシャル', 'スモークドビール', 'バーレイワイン', 'ストロングエール'
        ];

        foreach ($styles as $style) {
            $now = Carbon::now();
            DB::table('styles')->insert([
                'name' => $style,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
