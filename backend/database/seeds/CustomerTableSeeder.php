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
            'management_id' => '101',
            'shop_id' => '1',
            'name' => 'テスト太郎',
            'kana' => 'てすとたろう',
            'sex' => '男性',
            'birthday' => date('Y-m-d'),
            'job' => 'アパレル',
            'tel' => '08000000000',
            'email' => 'tarou@sample.com',
            'motive' => 'オシャレだったから',
            'where' => 'グーグル検索でHP',
            'memo' => '太郎さんは映画が好き',
            'demand' => '値段をもっと安くして欲しい。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('customers')->insert([
            'management_id' => '102',
            'shop_id' => '1',
            'name' => 'テスト洋子',
            'kana' => 'てすとようこ',
            'sex' => '女性',
            'birthday' => date('Y-m-d'),
            'job' => 'アパレル',
            'tel' => '09000000000',
            'email' => 'youko@sample.com',
            'motive' => 'オシャレだったから',
            'where' => 'グーグル検索でHP',
            'memo' => '洋子さんは映画が好き',
            'demand' => '値段をもっと低くして欲しい。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('customers')->insert([
            'management_id' => '103',
            'shop_id' => '1',
            'name' => 'テスト洋子',
            'kana' => 'てすとようこ',
            'sex' => '女性',
            'birthday' => date('Y-m-d'),
            'job' => 'アパレル',
            'tel' => '09000000000',
            'email' => 'youko@sample.com',
            'motive' => 'オシャレだったから',
            'where' => 'グーグル検索でHP',
            'memo' => '洋子さんは映画が好き',
            'demand' => '値段をもっと低くして欲しい。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('customers')->insert([
            'management_id' => '104',
            'shop_id' => '1',
            'name' => 'テスト洋子',
            'kana' => 'てすとようこ',
            'sex' => '女性',
            'birthday' => date('Y-m-d'),
            'job' => 'アパレル',
            'tel' => '09000000000',
            'email' => 'youko@sample.com',
            'motive' => 'オシャレだったから',
            'where' => 'グーグル検索でHP',
            'memo' => '洋子さんは映画が好き',
            'demand' => '値段をもっと低くして欲しい。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('customers')->insert([
            'management_id' => '105',
            'shop_id' => '1',
            'name' => 'テスト洋子',
            'kana' => 'てすとようこ',
            'sex' => '女性',
            'birthday' => date('Y-m-d'),
            'job' => 'アパレル',
            'tel' => '09000000000',
            'email' => 'youko@sample.com',
            'motive' => 'オシャレだったから',
            'where' => 'グーグル検索でHP',
            'memo' => '洋子さんは映画が好き',
            'demand' => '値段をもっと低くして欲しい。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('customers')->insert([
            'management_id' => '106',
            'shop_id' => '1',
            'name' => 'テスト洋子',
            'kana' => 'てすとようこ',
            'sex' => '女性',
            'birthday' => date('Y-m-d'),
            'job' => 'アパレル',
            'tel' => '09000000000',
            'email' => 'youko@sample.com',
            'motive' => 'オシャレだったから',
            'where' => 'グーグル検索でHP',
            'memo' => '洋子さんは映画が好き',
            'demand' => '値段をもっと低くして欲しい。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('customers')->insert([
            'management_id' => '107',
            'shop_id' => '1',
            'name' => 'テスト洋子',
            'kana' => 'てすとようこ',
            'sex' => '女性',
            'birthday' => date('Y-m-d'),
            'job' => 'アパレル',
            'tel' => '09000000000',
            'email' => 'youko@sample.com',
            'motive' => 'オシャレだったから',
            'where' => 'グーグル検索でHP',
            'memo' => '洋子さんは映画が好き',
            'demand' => '値段をもっと低くして欲しい。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('customers')->insert([
            'management_id' => '108',
            'shop_id' => '1',
            'name' => 'テスト洋子',
            'kana' => 'てすとようこ',
            'sex' => '女性',
            'birthday' => date('Y-m-d'),
            'job' => 'アパレル',
            'tel' => '09000000000',
            'email' => 'youko@sample.com',
            'motive' => 'オシャレだったから',
            'where' => 'グーグル検索でHP',
            'memo' => '洋子さんは映画が好き',
            'demand' => '値段をもっと低くして欲しい。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('customers')->insert([
            'management_id' => '109',
            'shop_id' => '1',
            'name' => 'テスト洋子',
            'kana' => 'てすとようこ',
            'sex' => '女性',
            'birthday' => date('Y-m-d'),
            'job' => 'アパレル',
            'tel' => '09000000000',
            'email' => 'youko@sample.com',
            'motive' => 'オシャレだったから',
            'where' => 'グーグル検索でHP',
            'memo' => '洋子さんは映画が好き',
            'demand' => '値段をもっと低くして欲しい。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('customers')->insert([
            'management_id' => '110',
            'shop_id' => '1',
            'name' => 'テスト洋子',
            'kana' => 'てすとようこ',
            'sex' => '女性',
            'birthday' => date('Y-m-d'),
            'job' => 'アパレル',
            'tel' => '09000000000',
            'email' => 'youko@sample.com',
            'motive' => 'オシャレだったから',
            'where' => 'グーグル検索でHP',
            'memo' => '洋子さんは映画が好き',
            'demand' => '値段をもっと低くして欲しい。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('customers')->insert([
            'management_id' => '111',
            'shop_id' => '1',
            'name' => 'テスト洋子',
            'kana' => 'てすとようこ',
            'sex' => '女性',
            'birthday' => date('Y-m-d'),
            'job' => 'アパレル',
            'tel' => '09000000000',
            'email' => 'youko@sample.com',
            'motive' => 'オシャレだったから',
            'where' => 'グーグル検索でHP',
            'memo' => '洋子さんは映画が好き',
            'demand' => '値段をもっと低くして欲しい。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('customers')->insert([
            'management_id' => '112',
            'shop_id' => '1',
            'name' => 'テスト洋子',
            'kana' => 'てすとようこ',
            'sex' => '女性',
            'birthday' => date('Y-m-d'),
            'job' => 'アパレル',
            'tel' => '09000000000',
            'email' => 'youko@sample.com',
            'motive' => 'オシャレだったから',
            'where' => 'グーグル検索でHP',
            'memo' => '洋子さんは映画が好き',
            'demand' => '値段をもっと低くして欲しい。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('customers')->insert([
            'management_id' => '113',
            'shop_id' => '1',
            'name' => 'テスト洋子',
            'kana' => 'てすとようこ',
            'sex' => '女性',
            'birthday' => date('Y-m-d'),
            'job' => 'アパレル',
            'tel' => '09000000000',
            'email' => 'youko@sample.com',
            'motive' => 'オシャレだったから',
            'where' => 'グーグル検索でHP',
            'memo' => '洋子さんは映画が好き',
            'demand' => '値段をもっと低くして欲しい。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('customers')->insert([
            'management_id' => '114',
            'shop_id' => '1',
            'name' => 'テスト洋子',
            'kana' => 'てすとようこ',
            'sex' => '女性',
            'birthday' => date('Y-m-d'),
            'job' => 'アパレル',
            'tel' => '09000000000',
            'email' => 'youko@sample.com',
            'motive' => 'オシャレだったから',
            'where' => 'グーグル検索でHP',
            'memo' => '洋子さんは映画が好き',
            'demand' => '値段をもっと低くして欲しい。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('customers')->insert([
            'management_id' => '115',
            'shop_id' => '1',
            'name' => 'テスト洋子',
            'kana' => 'てすとようこ',
            'sex' => '女性',
            'birthday' => date('Y-m-d'),
            'job' => 'アパレル',
            'tel' => '09000000000',
            'email' => 'youko@sample.com',
            'motive' => 'オシャレだったから',
            'where' => 'グーグル検索でHP',
            'memo' => '洋子さんは映画が好き',
            'demand' => '値段をもっと低くして欲しい。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
