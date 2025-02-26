<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'user_name' => 'テスト太郎',
            'postal_code' => '151-0053',
            'address' => '東京都渋谷区代々木1-2-3',
            'building' => '代々木マンション301号室',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('profiles')->insert($param);

        $param = [
            'user_id' => 2,
            'user_name' => 'テスト次郎',
            'postal_code' => '150-0013',
            'address' => '東京都渋谷区恵比寿1-2-3',
            'building' => '恵比寿マンション402号室',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('profiles')->insert($param);

        $param = [
            'user_id' => 3,
            'user_name' => 'テスト三郎',
            'postal_code' => '150-0032',
            'address' => '東京都渋谷区鶯谷町1-2-3',
            'building' => '鶯谷マンション503号室',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('profiles')->insert($param);
    }
}
