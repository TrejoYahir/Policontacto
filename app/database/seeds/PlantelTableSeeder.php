<?php

use Policontacto\Entidades\Plantel;

class PlantelTableSeeder extends Seeder
{

    public function run()
    {

    	Plantel::create([

            'id' => 1,
            'ubicacion' => '',
            'nombre' => 'CECyT 1 "Gonzalo Vázquez Vela" ',
            'area_id' => 1

        ]);

        Plantel::create([

            'id' => 2,
            'ubicacion' => '',
            'nombre' => 'CECyT 2 "Miguel Bernard"',
            'area_id' => 1

        ]);

        Plantel::create([

            'id' => 3,
            'ubicacion' => '',
            'nombre' => 'CECyT 3 "Estanislao Ramírez Ruiz"',
            'area_id' => 1

        ]);

        Plantel::create([

            'id' => 4,
            'ubicacion' => '',
            'nombre' => 'CECyT 4 "Lázaro Cárdenas"',
            'area_id' => 1

        ]);

        Plantel::create([

            'id' => 5,
            'ubicacion' => '',
            'nombre' => 'CECyT 5 "Benito Juárez García"',
            'area_id' => 2

        ]);

        Plantel::create([

            'id' => 6,
            'ubicacion' => '',
            'nombre' => 'CECyT 6 "Miguel Othón de Mendizábal"',
            'area_id' => 3

        ]);

        Plantel::create([

            'id' => 7,
            'ubicacion' => '',
            'nombre' => 'CECyT 7 "Cuauhtémoc"',
            'area_id' => 1

        ]);

        Plantel::create([

            'id' => 8,
            'ubicacion' => '',
            'nombre' => 'CECyT 8 "Narciso Bassols García"',
            'area_id' => 1

        ]);

        Plantel::create([

            'id' => 9,
            'ubicacion' => '',
            'nombre' => 'CECyT 9 "Juan de Dios Bátiz"',
            'area_id' => 1

        ]);

        Plantel::create([

            'id' => 10,
            'ubicacion' => '',
            'nombre' => 'CECyT 10 "Carlos Vallejo Márquez"',
            'area_id' => 1

        ]);

        Plantel::create([

            'id' => 11,
            'ubicacion' => '',
            'nombre' => 'CECyT 11 "Wilfrido Massieu Pérez"',
            'area_id' => 1

        ]);

        Plantel::create([

            'id' => 12,
            'ubicacion' => '',
            'nombre' => 'CECyT 12 "José María Morelos y Pavón"',
            'area_id' => 2

        ]);

        Plantel::create([

            'id' => 13,
            'ubicacion' => '',
            'nombre' => 'CECyT 13 "Ricardo Flores Magón"',
            'area_id' => 2

        ]);

        Plantel::create([

            'id' => 14,
            'ubicacion' => '',
            'nombre' => 'CECyT 14 "Luis Enrique Erro"',
            'area_id' => 2

        ]);

        Plantel::create([

            'id' => 15,
            'ubicacion' => '',
            'nombre' => 'CECyT 15 "Diódoro Antúnez Echegaray"',
            'area_id' => 3

        ]);

        Plantel::create([

            'id' => 16,
            'ubicacion' => 'Mar Mediterraneo, Popotla',
            'nombre' => 'CET 1 "Walter Cross Buchanan"',
            'area_id' => 1

        ]);
    }

}