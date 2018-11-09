<?php

use App\Models\ResourceType;
use Faker\Generator as Faker;

$factory->define(App\Models\Resource::class, function (Faker $faker) {
    $classRoomTypeIds = ResourceType::all()->pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'type' => $faker->randomElement(['CLASSROOM','INSTRUMENT']),
        'state' => $faker->randomElement(['AVAILABLE','IN_RESERVATION','DAMAGED','IN_MAINTENANCE']),
        'resource_type_id' => $faker->randomElement($classRoomTypeIds),
    ];
});
