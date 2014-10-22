<?php

use Faker\Factory as Faker;
use Policontacto\Entidades\Especialidad;

class EspecialidadTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

			Especialidad::create([
                'nombre'        => 'Sistemas digitales',
                'slug'              => 'sistemas',
                'descripcion'  =>$faker->text(200),
                'area_id'          => 1
			]);

        Especialidad::create([
            'nombre'        => 'Programación',
            'slug'              => 'programación',
            'descripcion'  =>$faker->text(200),
            'area_id'          => 1
        ]);

        Especialidad::create([
            'nombre'        => 'Máquinas con sistemas automatizados',
            'slug'              => 'maquinas',
            'descripcion'  =>$faker->text(200),
            'area_id'          => 1
        ]);

	}

}