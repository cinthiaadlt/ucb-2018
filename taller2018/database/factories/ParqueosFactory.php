<?php

use Faker\Generator as Faker;

$factory->define(\App\Parqueo::class, function (Faker $faker) {
    $id_zona = App\Zona::pluck('id_zonas')->toArray();
    return [
        'id_zonas' => $faker->randomElement($id_zona),
        'direccion' =>$faker -> address,
        'latitud_x' => $faker -> latitude,
        'longitud_y' =>$faker-> longitude,
        'cantidad_p' => $faker -> randomDigit,
        'foto' =>$faker->randomElement(['1542250356parqueo1.jpg','1542250434parqueo2.jpg','1542250532parqueo3.jpg','1542250609parqueo5.jpg']),
        'telefono_contacto_1' =>$faker -> phoneNumber,
        'telefono_contacto_2'=>$faker -> phoneNumber,
        'hora_apertura' =>$faker->randomElement(['10:00:00','08:00:00','09:00:00']),
        'hora_cierre'=>$faker->randomElement(['15:00:00','18:00:00','19:00:00']),
        'tarifa_hora_normal'=> $faker ->randomFloat($nbMaxDecimals =7, $min = 0, $max = 10),
        'estado_funcionamiento'=>$faker -> boolean,
        'cat_estado_parqueo'=>$faker->randomElement(['1','2','3','4']),
        'cat_validacion'=>$faker->randomElement(['1','2','3','4']),
        'remember_token' => str_random(10),

    ];
});
