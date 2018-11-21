<?php

use Illuminate\Database\Seeder;
use App\Zona;
use App\Parqueo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class); Por defecto ejemplo

        // Se necesita llenar usuarios, roles, users_roles, dias especificos
        $this->call(UsersTableSeeder::class);

        $this->call(RolesTableSeeder::class);

        $this->call(Users_RolesTableSeeder::class);

        $this->call(DiasTableSeeder::class);

        $this->call(ZonasTableSeeder::class);

        //Se crean las zonas, parqueos con la clase Factory
        //factory(Zona::class,7)->create();
        factory(Parqueo::class, 3)->create();

    }
}
