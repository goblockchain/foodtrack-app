<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOriginTransport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('origin_transport', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_driver');
            $table->string('cargo_destination');
            $table->string('zip_code');
            $table->string('state');
            $table->string('address');
            $table->integer('number');
            $table->string('complement')->nullable();
            $table->string('neighborhood');
            $table->dateTime('date');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('process_id')->unsigned();
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
        Schema::dropIfExists('origin_transport');
    }
}
