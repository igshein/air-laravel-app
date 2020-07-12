<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMouthTable extends Migration
{
    protected $table = 'mouth';
    protected $primaryKey = false;
    protected $timestamps = false;

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('mouth_id');
            $table->string('mouth_name_ru')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
