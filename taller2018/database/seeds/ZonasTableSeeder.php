<?php

use Illuminate\Database\Seeder;

class ZonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zonas')->insert([
          [
            'zona' => 'Achumani'
          ],
          [
            'zona' => 'Calacoto'
          ],
          [
            'zona' => 'Irpavi'
          ],
          [
            'zona' => 'Obrajes'
          ],
          [
            'zona' => 'Sopocachi'
          ],
          [
            'zona' => 'Miraflores'
          ]
        ]);
    }
}
