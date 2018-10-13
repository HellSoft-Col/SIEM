<?php

use App\Models\Classroom_type;
use Faker\Generator as Faker;

$factory->define(App\Models\Resource::class, function (Faker $faker) {
    $classRoomTypeIds = Classroom_type::all()->pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'type' => $faker->randomElement(['CLASSROOM','INSTRUMENT']),
        'state' => $faker->randomElement(['AVAILABLE','IN_RESERVATION','DAMAGED','IN_MAINTENANCE']),
        'classroom_type_id' => $faker->randomElement($classRoomTypeIds),
    ];
});
