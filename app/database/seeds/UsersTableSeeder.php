<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        if (empty(User::where('email', 'igoshein@gmail.com')->first())) {
            if (empty(env('USER_ADMIN_PASSWORD'))) {
                throw new Exception('USER_ADMIN_PASSWORD not set in ./.env');
            }
            User::insert([
                'name' => 'admin',
                'email' => 'igoshein@gmail.com',
                'password' => Hash::make(env('USER_ADMIN_PASSWORD')),
            ]);
        }
    }
}
