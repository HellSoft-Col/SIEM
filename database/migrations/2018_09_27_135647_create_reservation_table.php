<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->enum('state', ['ACTIVE', 'CANCELED', 'FINALIZED', 'RUNNING']);
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('resource_id');
            $table->boolean('moulted')->default(false);
            $table->foreign('resource_id')->references('id')->on('resource')->onDelete('cascade');
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
        Schema::dropIfExists('reservation');
    }
}
