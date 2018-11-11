<?php

use App\Models\Resource;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Reservation::class, function (Faker $faker) {
    $usersIds = User::all()->pluck('id')->toArray();
    $resourceIds = Resource::all()->pluck('id')->toArray();
    $startDate = $faker->dateTimeBetween('next Monday', 'next Monday +7 days');
    $endDate = $faker->dateTimeBetween($startDate, $startDate->format('Y-m-d H:i:s'));
    return [
        'state' => $faker->randomElement(['ACTIVE', 'FINALIZED', 'ACTIVE']),
        'start_time' => $faker->dateTimeThisYear($startDate = 'now', $interval = '+ 5 days', $timezone = null),
        'end_time' => $faker->dateTimeThisYear($startDate = '+5 days', $interval = '+ 1 days', $timezone = null),
        'user_id' => $faker->randomElement($usersIds),
        'resource_id' => $faker->randomElement($resourceIds),
        'moulted' => $faker->boolean($chanceOfGettingTrue = 50),
    ];
});
