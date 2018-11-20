<?php

use Illuminate\Database\Seeder;

class DiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dias')->insert([
            // Para que los tres tipos de roles puedan darse,
            // Poner php artisan migrate:fresh --seed para hacer la migración del seed
            // primero php artisan db:seed --class=RolesTableSeeder
            // y luego php artisan db:seed --class=UsersTableSeeder
            // finalmente php artisan db:seed --class=DiasTableSeeder
          [
            'nombre' => 'Lunes'
          ],
          [
            'nombre' => 'Martes'
          ],
          [
            'nombre' => 'Miercoles'
          ],
          [
            'nombre' => 'Jueves'
          ],
          [
            'nombre' => 'Viernes'
          ],
          [
            'nombre' => 'Sabado'
          ],
          [
            'nombre' => 'Domingo'
          ]
        ]);
    }
}
