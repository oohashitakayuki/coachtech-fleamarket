<?php

namespace Database\Seeders;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item1 = Item::create([
            'profile_id' => 1,
            'name' => '腕時計',
            'image' => 'item_images/Armani+Mens+Clock.jpg',
            'brand' => 'EMPORIO ARMANI',
            'condition' => '良好',
            'description' => 'スタイリッシュなデザインのメンズ腕時計',
            'price' => 15000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $item1->categories()->attach(12);

        $item2 = Item::create([
            'profile_id' => 1,
            'name' => 'HDD',
            'image' => 'item_images/HDD+Hard+Disk.jpg',
            'brand' => '東芝',
            'condition' => '目立った傷や汚れなし',
            'description' => '高速で信頼性の高いハードディスク',
            'price' => 5000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $item2->categories()->attach(2);

        $item3 = Item::create([
            'profile_id' => 2,
            'name' => '玉ねぎ3束',
            'image' => 'item_images/iLoveIMG+d.jpg',
            'brand' => 'らでぃっしゅぼーや',
            'condition' => 'やや傷や汚れあり',
            'description' => '新鮮な玉ねぎ3束のセット',
            'price' => 300,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $item3->categories()->attach(10);

        $item4 = Item::create([
            'profile_id' => 3,
            'name' => '革靴',
            'image' => 'item_images/Leather+Shoes+Product+Photo.jpg',
            'brand' => 'REGAL',
            'condition' => '状態が悪い',
            'description' => 'クラシックなデザインの革靴',
            'price' => 4000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $item4->categories()->attach(1);

        $item5 = Item::create([
            'profile_id' => 2,
            'name' => 'ノートPC',
            'image' => 'item_images/Living+Room+Laptop.jpg',
            'brand' => 'Apple',
            'condition' => '良好',
            'description' => '高性能なノートパソコン',
            'price' => 45000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $item5->categories()->attach(2);

        $item6 = Item::create([
            'profile_id' => 3,
            'name' => 'マイク',
            'image' => 'item_images/Music+Mic+4632231.jpg',
            'brand' => 'Shure',
            'condition' => '目立った傷や汚れなし',
            'description' => '高音質のレコーディング用マイク',
            'price' => 8000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $item6->categories()->attach(2);

        $item7 = Item::create([
            'profile_id' => 3,
            'name' => 'ショルダーバッグ',
            'image' => 'item_images/Purse+fashion+pocket.jpg',
            'brand' => 'COACH',
            'condition' => 'やや傷や汚れあり',
            'description' => 'おしゃれなショルダーバッグ',
            'price' => 3500,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $item7->categories()->attach(1);

        $item8 = Item::create([
            'profile_id' => 1,
            'name' => 'タンブラー',
            'image' => 'item_images/Tumbler+souvenir.jpg',
            'brand' => 'HARIO',
            'condition' => '状態が悪い',
            'description' => '使いやすいタンブラー',
            'price' => 500,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $item8->categories()->attach(10);

        $item9 = Item::create([
            'profile_id' => 2,
            'name' => 'コーヒーミル',
            'image' => 'item_images/Waitress+with+Coffee+Grinder.jpg',
            'brand' => 'Kalita',
            'condition' => '良好',
            'description' => '手動のコーヒーミル',
            'price' => 4000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $item9->categories()->attach(10);

        $item10 = Item::create([
            'profile_id' => 3,
            'name' => 'メイクセット',
            'image' => 'item_images/外出メイクアップセット.jpg',
            'brand' => 'LUNASOL',
            'condition' => '目立った傷や汚れなし',
            'description' => '便利なメイクアップセット',
            'price' => 2500,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $item10->categories()->attach(6);
    }
}
