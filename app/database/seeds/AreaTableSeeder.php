<?php

use Policontacto\Entidades\Area;

class AreaTableSeeder extends Seeder
{

    public function run()
    {

        Area::create([
            'nombre' => 'Ingeniería y ciencias físicio matemáticas',
            'descripcion' => 'Aquí estudias matemáticas',
            'slug' => 'matematicas'
        ]);

        Area::create([
            'nombre' => 'Ciencias sociales y administrativas',
            'descripcion' => 'Aquí estudias ciencias sociales',
            'slug' => 'sociales'
        ]);

        Area::create([
            'nombre' => 'Ciencias médico biológicas',
            'descripcion' => 'Aquí estudias ciencias médico biológicas',
            'slug' => 'biologicas'
        ]);
    }

}