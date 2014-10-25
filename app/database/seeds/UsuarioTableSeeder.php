<?php

use Faker\Factory as Faker;
use Policontacto\Entidades\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            User::create([

            ]);
        }
    }

}