<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('eventFeedGeneral', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date_time');
            $table->timestamp('date_time_end');
            $table->string('description');
            $table->string('artist');
            $table->string('place')->nullable();
            $table->string('name');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('eventFeedGeneral');
    }
}
