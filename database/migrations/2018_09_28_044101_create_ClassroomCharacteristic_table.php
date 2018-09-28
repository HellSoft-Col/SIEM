<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomCharacteristicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ClassroomCharacteristic', function (Blueprint $table) {
            $table->unsignedInteger('resource_id');
            $table->unsignedInteger('characteristic_id');
            $table->foreign('resource_id')->references('id')->on('resource');
            $table->foreign('characteristic_id')->references('id')->on('characteristic');
            $table->primary(['resource_id','characteristic_id']);
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
        Schema::dropIfExists('ClassroomCharacteristic');
    }
}
