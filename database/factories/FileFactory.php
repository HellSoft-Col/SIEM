<?php

use App\Models\Resource;
use Faker\Generator as Faker;
use App\Models\File;
use App\Models\Event;
use App\Models\Publication;

$factory->define(File::class, function (Faker $faker) {
    $eventsIds = Event::all()->pluck('id')->toArray();
    $publicationsIds = Publication::all()->pluck('id')->toArray();
    $resourcesIds = Resource::all()->pluck('id')->toArray();
    return [
        'path' => '/img/sala_test.jpg',
        'description' => $faker ->realText($maxNbChars = 100, $indexSize = 2),
        'publication_id' => $faker ->randomElement($publicationsIds),
        'event_id' => $faker->randomElement($eventsIds),
        'resource_id' => $faker->randomElement($resourcesIds),
        'type' => $faker ->randomElement(['EVENT','PUBLICATION']),

    ];
});
