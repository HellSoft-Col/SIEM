<?php

use App\Models\Classroom_type;
use Illuminate\Database\Seeder;

class Classroom_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Classroom_type::class,4)->create();
    }
}
