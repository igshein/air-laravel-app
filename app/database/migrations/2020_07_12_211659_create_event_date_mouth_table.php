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
            $table->unsignedInteger('event_id');
            $table->unsignedInteger('mouth_id');
        });

        Schema::table($this->table, function (Blueprint $table) {
            $table->foreign('event_id')->references('event_id')->on('event')->onDelete('cascade');
            $table->index('event_id');

            $table->foreign('mouth_id')->references('mouth_id')->on('mouth')->onDelete('cascade');
            $table->index('mouth_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
