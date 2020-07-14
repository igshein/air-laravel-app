<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTableSeeder extends Seeder
{
    private $tableEvent = 'event';
    private $tableEventDateDay = 'event_date_day';
    private $tableEventDateMouth = 'event_date_mouth';
    private $tableEventDateYear = 'event_date_year';

    public function run()
    {
        $i = 1;
        if (empty(DB::table($this->tableEvent)->select()->where('event_name', "Event $i")->first())) {
            DB::table($this->tableEvent)->insert([
                'event_name' => "Event $i",
                'event_time' => date('H:i:s')
            ]);
            $lastInsertEventId = DB::getPdo()->lastInsertId();
            DB::table($this->tableEventDateDay)->insert([
                'event_date_number_day' => 10,
                'event_id' => $lastInsertEventId
            ]);
            $lastInsertDayId = DB::getPdo()->lastInsertId();
            DB::table($this->tableEventDateMouth)->insert([
                'event_date_number_mouth' => 7,
                'event_date_day_id' => $lastInsertDayId
            ]);
            $lastInsertMouthId = DB::getPdo()->lastInsertId();
            DB::table($this->tableEventDateYear)->insert([
                'event_date_number_year' => (int)"202$i",
                'event_date_mouth_id' => $lastInsertMouthId
            ]);
        }

        $i = 2;
        if (empty(DB::table($this->tableEvent)->select()->where('event_name', "Event $i")->first())) {
            DB::table($this->tableEvent)->insert([
                'event_name' => "Event $i",
                'event_time' => date('H:i:s')
            ]);
            $lastInsertEventId = DB::getPdo()->lastInsertId();
            DB::table($this->tableEventDateDay)->insert([
                'event_date_number_day' => 10,
                'event_id' => $lastInsertEventId
            ]);
            $lastInsertDayId = DB::getPdo()->lastInsertId();
            DB::table($this->tableEventDateMouth)->insert([
                'event_date_number_mouth' => 7,
                'event_date_day_id' => $lastInsertDayId
            ]);
            $lastInsertMouthId = DB::getPdo()->lastInsertId();
            DB::table($this->tableEventDateYear)->insert([
                'event_date_number_year' => (int)"202$i",
                'event_date_mouth_id' => $lastInsertMouthId
            ]);
        }
    }
}
