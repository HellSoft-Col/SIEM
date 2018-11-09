<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ResourceType::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'type' => $faker->randomElement(['CLASSROOM','INSTRUMENT']),
    ];
});
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
