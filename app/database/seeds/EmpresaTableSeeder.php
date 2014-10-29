<?php

use Faker\Factory as Faker;
use Policontacto\Entidades\Empresa;
use Policontacto\Entidades\User;

class EmpresaTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $user = User::create([

                'email' => $faker->companyEmail,
                'password' => 123456,
                'descripcion' => $faker->text(200),
                'url_foto' => $faker->imageUrl($width = 640, $height = 480, 'cats')

            ]);

            $nombre = $faker->company;

            Empresa::create([

                'id' => $user->id,
                'ubicacion' => $faker->address,
                'nombre' => $nombre,
                'area_id' => $faker->numberBetween(1, 3),
                'requisitos' => $faker->text(),
                'slug' => \Str::slug($nombre)

            ]);
        }
    }

}