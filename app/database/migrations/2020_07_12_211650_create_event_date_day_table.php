<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventDateDayTable extends Migration
{
    protected $table = 'event_date_day';
    protected $primaryKey = false;
    protected $timestamps = false;

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('event_date_day_id');
            $table->unsignedInteger('event_date_number_day');
            $table->unsignedInteger('event_id');
        });

        Schema::table($this->table, function (Blueprint $table) {
            $table->foreign('event_id')->references('event_id')->on('event')->onDelete('cascade');
            $table->index('event_id');

            $table->index('event_date_number_day');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
