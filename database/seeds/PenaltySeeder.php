<?php

use Illuminate\Database\Seeder;
use App\Models\Penalty;

class PenaltySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Penalty::class,2)->create();
    }
}
