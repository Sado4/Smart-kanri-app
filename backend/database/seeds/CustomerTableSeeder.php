<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'management_id' => '1',
            'shop_id' => '1',
            'name' => 'テスト太郎',
            'kana' => 'てすとたろう',
            'sex' => '女性',
            'birthday' => date('Y-m-d'),
            'job' => 'アパレル',
            'tel' => '08000000000',
            'email' => 'tarou@gmail.com',
            'motive' => 'オシャレだったから',
            'where' => 'グーグル検索でHP',
            'memo' => '太郎さんは映画が好き',
            'demand' => '値段をもっと安くして欲しい。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}