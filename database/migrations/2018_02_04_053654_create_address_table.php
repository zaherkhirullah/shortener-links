<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('country', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name');             
             $table->string('sembol')->nullable();
             $table->string('cca2')->nullable();
             $table->string('cca3')->nullable();
             $table->string('flag')->nullable();
             $table->string('currency')->nullable();
             $table->integer('ecmp')->nullable();
             $table->float('link_price',8,4)->scale(6)->default(0.004);
             $table->float('file_price',8,4)->scale(6)->default(0.004);
             $table->boolean('isDeleted')->default(0);
            
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
        
        //   Schema::create('city', function (Blueprint $table) {
        //       $table->increments('id');
        //     $table->integer('country_id')->unsigned();
        //     $table->string('name');
        //     $table->string('zip_code')->nullable();
        //     $table->timestamps();
        //     $table->boolean('isDeleted')->default(0);
        //     $table->unique('zip_code');
        //     $table->engine = 'InnoDB';
        // });

       Schema::create('address', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('country_id')->unsigned()->default(1);
            $table->integer('user_id')->unsigned();
            $table->string('state')->default('-');
            $table->string('city')->default('-');
            $table->string('Address1')->default('-');
            $table->string('Address2')->nullable();
            $table->string('zip_code')->nullable();
            $table->boolean('isDeleted')->default(0);
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
        // Schema::dropIfExists('city');
        Schema::dropIfExists('country');
    }
}

   