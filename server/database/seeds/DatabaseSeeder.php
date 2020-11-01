<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->call(RestaurantTableSeeder::class);
    }
    // 順番関係ある 先にカテゴリーを選べるようにしないと働かない
}
