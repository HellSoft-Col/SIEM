<?php

use Faker\Generator as Faker;
use App\Models\File;
use App\Models\Event;
use App\Models\Publication;

$factory->define(File::class, function (Faker $faker) {
    $eventsIds = Event::all()->pluck('id')->toArray();
    $publicationsIds = Publication::all()->pluck('id')->toArray();
    return [
        'path' => 'files\uploads',
        'description' => $faker ->realText($maxNbChars = 100, $indexSize = 2),
        'event_id' => $faker -> randomElement($eventsIds),
        'publication_id' => $faker ->randomElement($publicationsIds),
        'type' => $faker ->randomElement(['EVENT','PUBLICATION']),

    ];
});
