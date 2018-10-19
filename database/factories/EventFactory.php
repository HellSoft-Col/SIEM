<?php

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Event::class, function (Faker $faker) {
    $usersIds = User::all()->pluck('id')->toArray();
    return [
        'date_time' => $faker->dateTimeBetween('next Monday', 'next Monday +45 days')->format('Y-m-d H:i:s'),
        'date_time_end' => $faker->dateTimeBetween('next Monday', 'next Monday +7 days')->format('Y-m-d H:i:s'),
        'description' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'place' => $faker-> streetAddress,
        'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'user_id' => $faker->randomElement($usersIds),
    ];
});
