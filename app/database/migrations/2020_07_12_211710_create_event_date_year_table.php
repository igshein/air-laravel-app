<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventDateYearTable extends Migration
{
    protected $table = 'event_date_year';
    protected $primaryKey = false;
    protected $timestamps = false;

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('event_date_year_id');
            $table->unsignedInteger('event_date_mouth_id');
            $table->unsignedInteger('year');
        });

        Schema::table($this->table, function (Blueprint $table) {
            $table->foreign('event_date_mouth_id')->references('event_date_mouth_id')->on('event_date_mouth')->onDelete('cascade');
            $table->index('event_date_mouth_id');

            $table->index('year');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}

