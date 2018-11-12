<?php

use App\Models\Characteristic;
use Faker\Generator as Faker;

$factory->define(Characteristic::class, function (Faker $faker) {
    $arrays = ['Sonido', 'Piano', 'TornaMesa', 'Proyector', 'Correa', 'Silla', 'Banco', 'Boquilla', 'Consola de mezcla', 'Microfono'];
    return [
        'name' => $faker->randomElement($arrays),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'type' => $faker->randomElement(['CLASSROOM','INSTRUMENT']),
    ];
});
