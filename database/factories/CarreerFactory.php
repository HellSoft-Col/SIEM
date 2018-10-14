<?php

use Faker\Generator as Faker;

$factory->define(/**
 * @param Faker $faker
 * @return array
 */
    App\Models\Carreer::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->unique()->word,
        'type' => $faker->randomElement(['UNDERGRADUATE','POSTGRADUATE']),
    ];
});
