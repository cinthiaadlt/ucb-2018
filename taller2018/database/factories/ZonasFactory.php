<?php

use Faker\Generator as Faker;

$factory->define(App\Zona::class, function (Faker $faker) {
    return [
        'zona'=> $faker->randomElement(['Miraflores','Sopocachi','San Pedro','Obrajes','Calacoto']),
        'calle'=>$faker-> streetName,
        'ciudad'=> $faker-> city,
        'created_at'=>now(),
    ];
});
