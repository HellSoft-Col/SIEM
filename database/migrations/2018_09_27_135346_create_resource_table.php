<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->enum('type',['CLASSROOM','INSTRUMENT']);
            $table->enum('state',['AVAILABLE','IN_RESERVATION','DAMAGED','IN_MAINTENANCE']);
            $table->unsignedInteger('resource_type_id')->nullable();
            $table->foreign('resource_type_id')->references('id')->on('resource_type');

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
        Schema::dropIfExists('resource');
    }
}
