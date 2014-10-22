<?php

use Policontacto\Entidades\Plantel;

class PlantelTableSeeder extends Seeder {

	public function run()
	{

			Plantel::create([

                'id'              => 9,
                'ubicacion' => 'Mar Mediterraneo, Popotla',
                'nombre'    => 'CECyT 9 "Juan de Dios Bátiz"',
                'area_id'     => 1

			]);
	}

}