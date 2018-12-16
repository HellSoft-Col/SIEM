<?php

use App\Models\User;
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
        $file_data = [
            'path' => 'storage/boy.svg',
            'description' => 'generic icon',
            'type' => 'USER',
        ];
        \App\Models\File::create($file_data);
        factory(User::Class,30)->create();
    }
}
