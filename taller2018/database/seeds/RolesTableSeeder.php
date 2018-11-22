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
        'nombre_role' => 'Admin',
        'descripcion_role' => 'Administra',
      ],
      [
        'nombre_role' => 'User',
        'descripcion_role' => 'Usuario',
      ],
      [
        'nombre_role' => 'Owner',
        'descripcion_role' => 'Owner',
      ]
    ]);
    }
}
