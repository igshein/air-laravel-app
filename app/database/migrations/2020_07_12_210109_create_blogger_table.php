<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloggerTable extends Migration
{
    protected $table = 'blogger';
    protected $primaryKey = false;
    protected $timestamps = false;

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('blogger_id');
            $table->string('blogger_name')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
