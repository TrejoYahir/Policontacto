<?php

use Faker\Factory as Faker;
use Policontacto\Entidades\Publicacion;

class TblPublicacionTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Publicacion::create([

            ]);
        }
    }

}