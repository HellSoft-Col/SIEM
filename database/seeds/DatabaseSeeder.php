<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UsersSeeder::class);
        $this->call(Classroom_typeSeeder::class);
        $this->call(ResourceSeeder::class);
        $this->call(ReservationSeeder::class);
        Model::reguard();
    }
}
