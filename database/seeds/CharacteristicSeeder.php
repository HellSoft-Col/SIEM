<?php

use Illuminate\Database\Seeder;
use App\Models\Characteristic;

class CharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Characteristic::class,20)->create();
    }
}
