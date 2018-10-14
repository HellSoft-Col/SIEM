<?php

use App\Models\Resource;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ResourceSeeder extends Seeder
{

    public function run( Faker $faker)
    {
        factory(Resource::class,5)->create();

        $characteristics = \App\Models\Characteristic::all();
        $resources = Resource::all();

        foreach ($resources as $resource){
            for ($i = 0 ; $i < $faker->numberBetween(0,2) ;$i++ ){
                $resource->characteristics()->attach($faker->randomElement($resources->pluck('id')->toArray()),['quantity' => $faker->numberBetween(0,10)]);
            }
        }
    }
}
