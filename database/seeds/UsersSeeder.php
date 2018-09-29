<?php

use App\User;
use Illuminate\Database\Seeder;



class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::Class,10)->create();
    }
}
