<?php

use Illuminate\Database\Seeder;
use App\Models\Event;
use Faker\Generator as Faker;

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

        $names = ["dummy/events/event_conferencia.png","dummy/events/event_estelares.jpg","dummy/events/event_oboe.jpg","dummy/events/event_oboe_fagot.jpg","dummy/events/event_percusion.jpg","dummy/events/event_piano.jpg","dummy/events/event_previsiones.png"] ;
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
