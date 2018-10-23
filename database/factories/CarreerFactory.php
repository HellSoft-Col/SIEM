<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Carreer::class, function (Faker $faker) {

    $names = ['musica','ingenieria de sistemas','comunicacion social','ingenieria electronica','sociologia','psicologia','mekatronica','periodismo','lenguas','literatura','filosofia del arte'];
    return [
        //
        'name' => $faker->randomElement($names),
        'type' => $faker->randomElement(['UNDERGRADUATE','POSTGRADUATE']),
    ];
});
