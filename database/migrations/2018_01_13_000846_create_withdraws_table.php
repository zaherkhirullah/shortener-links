<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithdrawsTable extends Migration
{
   
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->float('amount',8,4)
                      ->scale(6)->precision(50)->default(1);
            $table->integer('withdrawal_method_id')->unsigned();
            $table->string('withdraw_address');            
            $table->string('transaction_id')->default(0);
            $table->boolean('isDeleted')->default(0);
            $table->string('status',256)
                  ->comment('active','pending','cancled');
            $table->timestamps();
            
        });  
        Schema::table('withdraws', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');
        });
        
    }

    public function down()
    {
        Schema::table('withdraws', function ($table) {
            $table->dropForeign('withdraws_user_id_foreign');
         });
        Schema::dropIfExists('withdraws');

    }
}
