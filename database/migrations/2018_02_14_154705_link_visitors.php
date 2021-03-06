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
        Schema::create('link_visitors', function (Blueprint $table) {
            $table->increments('id');
            $table->ipAddress('ip');	            
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->integer('link_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('link_visitors', function ( $table) {
            $table->foreign('link_id')->references('id')->on('links');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
        Schema::table('link_visitors', function ( $table) {
         $table->dropForeign('link_visitors_link_id_foreign');                
        });
        Schema::dropIfExists('link_visitors');
    }
}
