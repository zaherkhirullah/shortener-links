<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LinkVisitors extends Migration
{
   
/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linkVisitors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip');
            $table->string('country')->nullable();
            $table->integer('link_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linkVisitors');
    }
}
