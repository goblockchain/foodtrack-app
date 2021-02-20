<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifyStatusProcess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notify_status_process', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('message');
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
        Schema::dropIfExists('notify_status_process');
    }
}
