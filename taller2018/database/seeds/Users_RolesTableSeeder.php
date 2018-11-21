<?php

use Illuminate\Database\Seeder;

class Users_RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_role')->insert([
            [
                'id'=>'1',
                'id_role'=>'1',//Administrador
                'id_user'=>'1',//Diego
                'created_at'=>today(),
            ],
            [
                'id'=>'2',
                'id_role'=>'2',//Usuario
                'id_user'=>'2',//Cinthia
                'created_at'=>today(),
            ],
            [
                'id'=>'3',
                'id_role'=>'3',//Owner
                'id_user'=>'3',//Juani
                'created_at'=>today(),
            ]


        ]);
    }
}
