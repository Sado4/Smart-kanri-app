<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SectorTableSeeder::class,
            PositionTableSeeder::class,
            ShopTableSeeder::class,
            UserTableSeeder::class,
            CustomerTableSeeder::class,
        ]);
    }
}