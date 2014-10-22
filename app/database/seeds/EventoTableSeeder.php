<?php

use Faker\Factory as Faker;
use Policontacto\Entidades\Evento;

class EventoTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Evento::create([

			]);
		}
	}

}