<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    protected $table = 'event';
    protected $primaryKey = false;
    protected $timestamps = false;

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('event_id');
            $table->string('event_name');
            $table->time('event_time');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}

