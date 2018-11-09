<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('university_id')->unique()->nullable();
            $table->string('name');
            $table->string('username',100)->unique();
            $table->integer('semester')->nullable();
            $table->string('identification')->unique()->nullable();
            $table->string('email')->unique();
            $table->unsignedInteger('carreer_id')->nullable();
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
