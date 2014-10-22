<?php

use Faker\Factory as Faker;
use Policontacto\Entidades\Vacante;

class VacanteTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Vacante::create([

			]);
		}
	}

}