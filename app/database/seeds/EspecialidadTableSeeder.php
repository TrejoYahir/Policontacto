<?php

use Policontacto\Entidades\Especialidad;

class EspecialidadTableSeeder extends Seeder
{

    public function run()
    {


        Especialidad::create([
            'nombre' => 'Sistemas digitales',
            'slug' => 'sistemas',
            'descripcion' => 'muchos leds y cables',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Programación',
            'slug' => 'programación',
            'descripcion' => 'computadoras y memorias',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Máquinas con sistemas automatizados',
            'slug' => 'maquinas',
            'descripcion' => 'muchas herammientas',
            'area_id' => 1
        ]);

    }

}