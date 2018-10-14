<?php

use Faker\Generator as Faker;
use App\Models\User;

$factory->define(App\Models\Publication::class, function (Faker $faker) {
    $header = $faker->sentence($nbWords = 2, $variableNbWords = true);
    $usersIds = User::all()->pluck('id')->toArray();
    return [
        'header' => strtoupper($header),
        'date_time' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'description' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'user_id' => $faker->randomElement($usersIds),

    ];
});
