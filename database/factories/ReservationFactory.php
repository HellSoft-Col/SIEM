<?php

use App\Models\Resource;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Reservation::class, function (Faker $faker) {
    $usersIds = User::all()->pluck('id')->toArray();
    $resourceIds = Resource::all()->pluck('id')->toArray();
    return [
        'state' => $faker->randomElement(['ACTIVE','CANCELED','FINALIZED']),
        'start_time' => $faker->dateTime($max = 'now', $timezone = null),
        'end_time' => $faker->dateTime($max = 'now', $timezone = null),
        'user_id' => $faker->randomElement($usersIds),
        'resource_id' => $faker->randomElement($resourceIds),
        'moulted' => $faker->boolean($chanceOfGettingTrue = 50),
    ];
});
