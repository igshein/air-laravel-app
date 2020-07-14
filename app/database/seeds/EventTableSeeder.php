<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTableSeeder extends Seeder
{
    private $tableEvent = 'event';
    private $tableEventDateMouth = 'event_date_mouth';
    private $tableEventDateYear = 'event_date_year';

    public function run()
    {
//        $table->increments('event_id');
//        $table->string('event_name');
//        $table->timeStamp('event_date');

        DB::table($this->tableEvent)->insert([
            'event_name' => 'Event 1',
            'event_date' => date('d H:i:s')
        ]);

        /*
        $year = 2021;
        for ($i = 1; $i < 11; $i++) {
            if (empty(DB::table($this->tableEvent)->select()->where('blogger_name', "Blogger $i")->first())) {

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
        */
    }
}
