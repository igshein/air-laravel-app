<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloggerEventTable extends Migration
{
    protected $table = 'blogger_event';
    protected $primaryKey = false;
    protected $timestamps = false;

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('blogger_event_id');
            $table->unsignedInteger('event_id');
            $table->unsignedInteger('blogger_id');
            $table->integer('blogger_event_order');
        });

        Schema::table($this->table, function (Blueprint $table) {
            $table->foreign('event_id')->references('event_id')->on('event')->onDelete('cascade');
            $table->foreign('blogger_id')->references('blogger_id')->on('blogger')->onDelete('cascade');

            $table->unique(['event_id', 'blogger_id'], 'composite_index');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}


