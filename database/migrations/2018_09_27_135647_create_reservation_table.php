<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('state',['ACTIVE','CANCELED','FINALIZED']);
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('resource_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('resource_id')->references('id')->on('resource');
            $table->boolean('moulted')->default(false);
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
        Schema::dropIfExists('reservation');
    }
}
