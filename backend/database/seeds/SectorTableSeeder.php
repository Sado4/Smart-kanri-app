<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sectors')->insert([
            'name'=>'ネイルサロン',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
