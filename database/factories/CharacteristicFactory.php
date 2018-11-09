<?php

use Faker\Generator as Faker;
use App\Models\Characteristic;

$factory->define(Characteristic::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'type' => $faker->randomElement(['CLASSROOM','INSTRUMENT']),
    ];
});
