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
        $this->call(PublicationSeeder::class);
        $this->call(PenaltySeeder::class);
        $this->call(FileSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(CharacteristicSeeder::class);
        Model::reguard();
    }
}
