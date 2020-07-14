<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BloggerSeeder extends Seeder
{
    private $tableBlogger = 'blogger';
    private $tableBloggerAvatar = 'blogger_avatar';

    public function run()
    {
        for ($i = 1; $i < 11; $i++) {
            if (empty(DB::table($this->tableBlogger)->select()->where('blogger_name', "Blogger $i")->first())) {
                DB::table($this->tableBlogger)->insert([
                    'blogger_name' => "Blogger $i"
                ]);
                $lastInsertBlogerId = DB::getPdo()->lastInsertId();
                DB::table($this->tableBloggerAvatar)->insert([
                    'blogger_id' => $lastInsertBlogerId,
                    'blogger_avatar_path' => '/storage/img/avatar/'.Hash::make("blogger_id:$i").'/default.jpg'
                ]);
            }
        }
    }
}
