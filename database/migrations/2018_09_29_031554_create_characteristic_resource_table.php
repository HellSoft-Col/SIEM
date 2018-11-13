<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacteristicResourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristic_resource', function (Blueprint $table) {
            $table->unsignedInteger('resource_id');
            $table->unsignedInteger('characteristic_id');
            $table->unsignedInteger('quantity')->default(1);
            $table->foreign('resource_id')->references('id')->on('resource')->onDelete('cascade');
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
        Schema::dropIfExists('characteristic_resource');
    }
}
