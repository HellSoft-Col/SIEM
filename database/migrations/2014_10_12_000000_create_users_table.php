<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('university_id');
            $table->string('name');
            $table->integer('semester');
            $table->string('identification')->unique();
            $table->string('email')->unique();
            $table->unsignedInteger('carreer_id');
            $table->foreign('carreer_id')->references('id')->on('carreer');
            $table->enum('role',['ADMIN','USER','MODERATOR'])->default('USER');
            $table->enum('type',['STUDENT','TEACHER'])->default('STUDENT');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
