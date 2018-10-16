<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->string('description')->nullable();
            $table->unsignedInteger('event_id')->nullable();
            $table->unsignedInteger('publication_id')->nullable();
            $table->unsignedInteger('resource_id')->nullable();
            $table->enum('type',['EVENT','PUBLICATION','USER']);
            $table->foreign('event_id')->references('id')->on('event');
            $table->foreign('publication_id')->references('id')->on('publication');
            $table->foreign('resource_id')->references('id')->on('resource');
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
        Schema::dropIfExists('file');
    }
}
