<?php

use App\Models\Carreer;
use App\Models\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    static $password;
    $carrersIds = Carreer::all()->pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'identification' => $faker->unique()->isbn10,
        'university_id' => $faker->unique()->isbn10,
        'semester' => $faker->numberBetween(1, 10),
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->unique()->userName,
        'role' => $faker->randomElement(['ADMIN','USER','MODERATOR']),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'carreer_id' => $faker->randomElement($carrersIds),
        'type' => $faker->randomElement(['STUDENT', 'TEACHER']),
        ];
});
