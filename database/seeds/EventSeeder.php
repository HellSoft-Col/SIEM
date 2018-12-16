<?php

use App\Models\Event;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        factory(Event::class,30)->create();

        $names = ["storage/dummy/events/event_conferencia.png", "storage/dummy/events/event_estelares.jpg", "storage/dummy/events/event_oboe.jpg", "storage/dummy/events/event_oboe_fagot.jpg", "storage/dummy/events/event_percusion.jpg", "storage/dummy/events/event_piano.jpg", "storage/dummy/events/event_previsiones.png"];
        $ids = Event::all()->pluck('id')->toArray();

        foreach ($ids as $event){
            $file_data = [
                'path' => $faker->randomElement($names),
                'description' => 'generic photo',
                'type' => 'EVENT',
                'event_id' => $event,
            ];
            \App\Models\File::create($file_data);
        }
    }
}
