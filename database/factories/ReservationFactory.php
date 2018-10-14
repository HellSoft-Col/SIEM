<?php

use App\Models\Resource;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Models\Reservation::class, function (Faker $faker) {
    $usersIds = User::all()->pluck('id')->toArray();
    $resourceIds = Resource::all()->pluck('id')->toArray();
    $startDate = $faker->dateTimeBetween('next Monday', 'next Monday +7 days');
    $endDate = $faker->dateTimeBetween($startDate, $startDate->format('Y-m-d H:i:s'));
    return [
        'state' => $faker->randomElement(['ACTIVE','CANCELED','FINALIZED']),
        'start_time' => $faker->dateTimeThisYear($startDate = 'now',$timezone = null),
        'end_time' => $faker->dateTimeThisYear($endDate='now',$timezone = null),
        'user_id' => $faker->randomElement($usersIds),
        'resource_id' => $faker->randomElement($resourceIds),
        'moulted' => $faker->boolean($chanceOfGettingTrue = 50),
    ];
});
