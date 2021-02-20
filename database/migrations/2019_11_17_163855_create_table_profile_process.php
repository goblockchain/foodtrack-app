<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfileProcess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_process', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status');
            $table->integer('order');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('process_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('process_id')->references('id')->on('process');

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
        Schema::dropIfExists('profile_process');
    }
}
