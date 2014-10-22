<?php

use Faker\Factory as Faker;
use Policontacto\Entidades\Area;

class AreaTableSeeder extends Seeder {

	public function run()
	{

        $faker = Faker::create();

       Area::create([
            'nombre'       => 'Ingeniería y ciencias físicio matemáticas',
            'descripcion' => $faker->text(200),
            'slug'              => 'matematicas'
        ]);

        Area::create([
            'nombre'       => 'Ciencias sociales y administrativas',
            'descripcion' => $faker->text(200),
            'slug'              => 'sociales'
        ]);

       Area::create([
            'nombre'       => 'Ciencias médico biológicas',
            'descripcion' => $faker->text(200),
            'slug'              => 'biologicas'
        ]);
	}

}