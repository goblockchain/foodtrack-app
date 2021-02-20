<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaboratoryProcess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratory_process', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('test');

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
        Schema::dropIfExists('laboratory_process');
    }
}
