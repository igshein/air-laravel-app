<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloggerAvatarTable extends Migration
{
    protected $table = 'blogger_avatar';
    protected $primaryKey = false;
    protected $timestamps = false;

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('blogger_id');
            $table->string('blogger_avatar_path')->unique();
        });

        Schema::table($this->table, function (Blueprint $table) {
            $table->foreign('blogger_id')->references('blogger_id')->on('blogger')->onDelete('cascade');
            $table->index('blogger_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
