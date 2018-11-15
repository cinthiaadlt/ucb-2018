<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert([
        // Para que los tres tipos de roles puedan darse,
        // Poner php artisan migrate:fresh --seed para hacer la migración del seed
        //  php artisan db:seed --class=RolesTableSeeder
      [
        'nombre_rol' => 'Administrador',
        'descripcion_rol' => 'Administra',
      ],
      [
        'nombre_rol' => 'Usuario',
        'descripcion_rol' => 'Usuario',
      ],
      [
        'nombre_rol' => 'Owner',
        'descripcion_rol' => 'Owner',
      ]
    ]);
    }
}
