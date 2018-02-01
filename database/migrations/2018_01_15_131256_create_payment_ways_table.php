<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentWaysTable extends Migration
{
    public function up()
    {
        Schema::create('payment_ways', function (Blueprint $table) {
            $table->increments('id');
             $table->string('name',100);
            $table->float('min_amount');
            $table->string('icon')->nullable();
             $table->boolean('isDeleted')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_ways');
    }
}
