<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => 1,
            'name' => 'ファッション',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => 2,
            'name' => '家電',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => 3,
            'name' => 'インテリア',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => 4,
            'name' => 'レディース',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => 5,
            'name' => 'メンズ',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => 6,
            'name' => 'コスメ',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => 7,
            'name' => '本',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => 8,
            'name' => 'ゲーム',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => 9,
            'name' => 'スポーツ',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => 10,
            'name' => 'キッチン',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => 11,
            'name' => 'ハンドメイド',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => 12,
            'name' => 'アクセサリー',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => 13,
            'name' => 'おもちゃ',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'id' => 14,
            'name' => 'ベビー・キッズ',
        ];
        DB::table('categories')->insert($param);
    }
}
