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
        //factory(Characteristic::class,20)->create();
        $arrays = ['Sonido','Piano','TornaMesa','Proyector','Correa','Silla','Banco','Boquilla','Consola de mezcla','Microfono'];
        foreach ($arrays as $element){
            $elementdata = [
                'name' => $element,
                'description' => "Caracteristica importante",
            ];
            Characteristic::create($elementdata);
        }
    }
}


