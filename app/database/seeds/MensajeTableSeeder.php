<?php

use Faker\Factory as Faker;
use Policontacto\Entidades\Mensaje;

class MensajeTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Mensaje::create([

            ]);
        }
    }

}