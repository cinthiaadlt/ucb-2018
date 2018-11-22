<?php

use Faker\Generator as Faker;

$factory->define(App\Zona::class, function (Faker $faker) {
    return [
        'zona'=> $faker->randomElement([
            'Irpavi','Miraflores','Sopocachi','San Pedro','Obrajes','Calacoto','Achumani'
            ]),
        'created_at'=>now(),
    ];
});
