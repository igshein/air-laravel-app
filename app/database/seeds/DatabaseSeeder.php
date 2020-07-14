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
        $this->call(UsersTableSeeder::class);
        $this->call(BloggerSeeder::class);
        $this->call(MouthTableSeeder::class);
        $this->call(EventTableSeeder::class);
    }
}
