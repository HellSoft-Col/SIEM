<?php

use Faker\Generator as Faker;
use App\Models\Reservation;
use App\Models\Penalty;
use Illuminate\Support\Carbon;


$factory->define(Penalty::class, function (Faker $faker) {
    $reservationsIds = Reservation::all()->pluck('id')->toArray();
    $startDate = $faker->dateTimeBetween('next Monday', 'next Monday +7 days');
    $endDate = $faker->dateTimeBetween($startDate, $startDate->format('Y-m-d H:i:s').' +1 day');
    return [
        'active' => $faker->boolean($chanceOfGettingTrue = 50),
        'reservation_id' => $faker->randomElement($reservationsIds),
        'penalty_end' => $faker->dateTimeThisYear($endDate = 'now',$timezone = null),
        'reason' => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
        'date_time' =>$faker->dateTimeThisYear($startDate = 'now', $timezone = null),

    ];
});
