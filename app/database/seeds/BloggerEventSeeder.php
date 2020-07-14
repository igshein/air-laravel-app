<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloggerEventSeeder extends Seeder
{
    private $tableBlogger = 'blogger';
    private $tableEvent = 'event';
    private $tableBloggerEvent = 'blogger_event';
    private $countMaxRow = 2;

    public function run()
    {
        $countRow = DB::table($this->tableBloggerEvent)->select()->get();
        if (count($countRow) < $this->countMaxRow) {
            for ($i = 1; $i <= $this->countMaxRow; $i++) {
                $blogger1 = DB::table($this->tableBlogger)->select('blogger_id')->where('blogger_name', "Blogger $i")->first();
                $blogger2 = DB::table($this->tableBlogger)->select('blogger_id')->where('blogger_name', "Blogger ". (1 + $i))->first();
                $blogger3 = DB::table($this->tableBlogger)->select('blogger_id')->where('blogger_name', "Blogger ". (2 + $i))->first();
                $event = DB::table($this->tableEvent)->select('event_id')->where('event_name', "Event $i")->first();
                DB::table($this->tableBloggerEvent)->insert([
                    'event_id' => $event->event_id,
                    'blogger_id' => $blogger1->blogger_id,
                    'blogger_event_order' => $i
                ]);
                DB::table($this->tableBloggerEvent)->insert([
                    'event_id' => $event->event_id,
                    'blogger_id' => $blogger2->blogger_id,
                    'blogger_event_order' => $i + 1
                ]);
                DB::table($this->tableBloggerEvent)->insert([
                    'event_id' => $event->event_id,
                    'blogger_id' => $blogger3->blogger_id,
                    'blogger_event_order' => $i + 2
                ]);
            }
        }
    }
}
