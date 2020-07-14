<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventDateMouthTable extends Migration
{
    protected $table = 'event_date_mouth';
    protected $primaryKey = false;
    protected $timestamps = false;

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('event_date_mouth_id');
            $table->unsignedInteger('event_date_number_mouth');
            $table->unsignedInteger('event_date_day_id');
        });

        Schema::table($this->table, function (Blueprint $table) {
            $table->foreign('event_date_day_id')->references('event_date_day_id')->on('event_date_day')->onDelete('cascade');
            $table->index('event_date_day_id');

            $table->index('event_date_number_mouth');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
