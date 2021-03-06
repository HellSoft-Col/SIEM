<?php

use App\Models\Resource;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Reservation::class, function (Faker $faker) {
    $usersIds = User::all()->pluck('id')->toArray();
    $resourceIds = Resource::all()->pluck('id')->toArray();

    return [
        'state' => $faker->randomElement(['ACTIVE', 'FINALIZED', 'ACTIVE', 'RUNNING']),
        'start_time' => $faker->dateTimeThisYear($startDate = 'now', $interval = '+ 5 days', $timezone = null),
        'end_time' => $faker->dateTimeThisYear($startDate = '+5 days', $interval = '+ 1 days', $timezone = null),
        'user_id' => $faker->randomElement($usersIds),
        'resource_id' => $faker->randomElement($resourceIds),
        'moulted' => $faker->boolean($chanceOfGettingTrue = 50),
    ];
});
