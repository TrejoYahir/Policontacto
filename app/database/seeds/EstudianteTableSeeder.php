<?php

use Faker\Factory as Faker;
use Policontacto\Entidades\Estudiante;
use Policontacto\Entidades\User;

class EstudianteTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{

            $user = User::create([

                'email'            => $faker->email,
                'password'    => 123456,
                'descripcion' => $faker->text(200),
                'url_foto'        => $faker->imageUrl(512, 512, 'people')

            ]);

            $nombre = $faker->firstName();
            $apellidos = $faker->lastName;
            $nombre_completo = $nombre . " " . $apellidos;

			Estudiante::create([

                'usuario_id'              => $user->id,
                'area_id'                   => 1,
                'serv_social'             => $faker->boolean(70),
                'empleo'                   => $faker->boolean(30),
                'nombre'                  => $nombre,
                'apellidos'                => $apellidos,
                'fecha_nacimiento' => $faker->dateTimeBetween('-30 years', '-17 years'),
                'curriculum'              => $faker->text(),
                'slug'                        => \Str::slug($nombre_completo),
                'plantel_id'               => 9,
                'especialidad_id'     => $faker->numberBetween(1,3)

			]);
		}
	}

}