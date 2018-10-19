<?php

use App\Models\Resource;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{

    public function run( Faker $faker)
    {
        factory(Resource::class,20)->create();

        $characteristics = \App\Models\Characteristic::all();
        $resources = Resource::all();

        foreach ($resources as $resource){
            for ($i = 0 ; $i < $faker->numberBetween(0,2) ;$i++ ){
                $resource->characteristics()->attach($faker->randomElement($characteristics->pluck('id')->toArray()),['quantity' => $faker->numberBetween(0,10)]);
            }
        }

        $ids = Resource::all()->pluck('id')->toArray();
        foreach ($ids as $id) {
            $file_data = [
                'path' => '/img/event_oboe_fagot.jpg',
                'description' => 'generic photo',
                'type' => 'PUBLICATION',
                'resource_id' => $id,
            ];
            \App\Models\File::create($file_data);
        }

    }
}
