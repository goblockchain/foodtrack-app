<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProucerProcess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producer_process', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('planting_s')->nullable();
            $table->date('planting_f')->nullable();
            $table->date('fertilizer_s')->nullable();
            $table->date('fertilizer_f')->nullable();
            $table->date('harvest_s')->nullable();
            $table->date('harvest_f')->nullable();
            $table->date('herbicide_s')->nullable();
            $table->date('herbicide_f')->nullable();
            $table->bigInteger('process_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->foreign('process_id')->references('id')->on('process');
            $table->foreign('user_id')->references('id')->on('users');

            $table->softDeletes();
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
        Schema::dropIfExists('producer_process');
    }
}
