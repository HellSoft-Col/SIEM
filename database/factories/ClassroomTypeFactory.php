<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Classroom_type::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
