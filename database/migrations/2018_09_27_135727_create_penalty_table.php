<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenaltyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penalty', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active');
            $table->unsignedInteger('reservation_id')->unique();
            $table->foreign('reservation_id')->references('id')->on('reservation');
            $table->timestamp('penalty_end');
            $table->string('reason')->nullable();
            $table->timestamp('date_time');
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
        Schema::dropIfExists('penalty');
    }
}
