<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            // Para que los tres tipos de roles puedan darse,
            // Poner php artisan migrate:fresh --seed para hacer la migración del seed
            // php artisan db:seed --class=RolesTableSeeder
            // y luego php artisan db:seed --class=UsersTableSeeder
          [
            'role_id' => '3',
            'name' => 'Juan Reyes',
            'email' => 'rata_reyes1@hotmail.com',
            'password' => Hash::make('hola123'),
          ],
          [
            'role_id' => '2',
            'name' => 'Cinthia Alvarez',
            'email' => 'cinthia1@gmail.com',
            'password' => Hash::make('hola123'),
          ],
          [
            'role_id' => '1',
            'name' => 'Diego Rocha',
            'email' => 'dsrr2r@gmail.com',
            'password' => Hash::make('111111'),
          ]
        ]);
    }
}
