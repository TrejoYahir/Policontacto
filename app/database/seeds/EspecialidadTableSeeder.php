<?php

use Policontacto\Entidades\Especialidad;

class EspecialidadTableSeeder extends Seeder
{

    public function run()
    {


        Especialidad::create([
            'nombre' => 'Aeronautica',
            'slug' => 'aeronautica',
            'descripcion' => '',
            'area_id' => 1
        ]);


        Especialidad::create([
            'nombre' => 'Construcción',
            'slug' => 'construccion',
            'descripcion' => '',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Deseño Grafico Digital',
            'slug' => 'diseno-grafico',
            'descripcion' => '',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Manufactura asistida por computadora',
            'slug' => 'manufactura-asistida',
            'descripcion' => '',
            'area_id' => 1
        ]);


        Especialidad::create([
            'nombre' => 'Programación',
            'slug' => 'programación',
            'descripcion' => 'computadoras y memorias',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Sistemas de control eléctrico',
            'slug' => 'sistemas-de-control',
            'descripcion' => '',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Sistemas mecánicos industriales',
            'slug' => 'sistemas-mecanicos',
            'descripcion' => '',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Automatización y control eléctrico industrial',
            'slug' => 'automatizacion-y-control',
            'descripcion' => '',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Instalaciones y mantenimiento eléctrico',
            'slug' => 'mantenimiento-electrico',
            'descripcion' => '',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Diagnostico y mejoramiento Ambiental',
            'slug' => 'mejoramiento-ambiental',
            'descripcion' => '',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Máquinas con sistemas automatizados',
            'slug' => 'maquinas',
            'descripcion' => 'muchas herammientas',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Plasticos',
            'slug' => 'plasticos',
            'descripcion' => '',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Redes de computo',
            'slug' => 'redes-computo',
            'descripcion' => '',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Sistemas constructivos asistidos por computadora',
            'slug' => 'sistemas-constructivos',
            'descripcion' => '',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Soldadura Industrial',
            'slug' => 'soldadura-industrial',
            'descripcion' => '',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Computación',
            'slug' => 'computacion',
            'descripcion' => '',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Dibujo asistido por computadora',
            'slug' => 'dibujo-asistido',
            'descripcion' => '',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Mantenimiento industrial',
            'slug' => 'mantenimiento-industrial',
            'descripcion' => '',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Metalurgia',
            'slug' => 'metalurgia',
            'descripcion' => '',
            'area_id' => 1
        ]);


        Especialidad::create([
            'nombre' => 'Procesos industriales',
            'slug' => 'procesos-industriales',
            'descripcion' => '',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Sistemas Automotrices',
            'slug' => 'sistemas-automotrices',
            'descripcion' => '',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Sistemas digitales',
            'slug' => 'sistemas-digitales',
            'descripcion' => 'muchos leds y cables',
            'area_id' => 1
        ]);

        Especialidad::create([
            'nombre' => 'Telecomunicaciones',
            'slug' => 'telecomunicaciones',
            'descripcion' => '',
            'area_id' => 1
        ]);


        Especialidad::create([
            'nombre' => 'Administración',
            'slug' => 'administracion',
            'descripcion' => '',
            'area_id' => 2
        ]);


        Especialidad::create([
            'nombre' => 'Contaduría',
            'slug' => 'contaduria',
            'descripcion' => '',
            'area_id' => 2
        ]);

        Especialidad::create([
            'nombre' => 'Administración de empresas turisticas',
            'slug' => 'administracion-empresas',
            'descripcion' => '',
            'area_id' => 2
        ]);

        Especialidad::create([
            'nombre' => 'Informática',
            'slug' => 'informatica',
            'descripcion' => '',
            'area_id' => 2
        ]);

        Especialidad::create([
            'nombre' => 'Comerecio nacional',
            'slug' => 'comercio',
            'descripcion' => '',
            'area_id' => 2
        ]);

        Especialidad::create([
            'nombre' => 'Mercadotecnia',
            'slug' => 'mercadotacia',
            'descripcion' => '',
            'area_id' => 2
        ]);

        Especialidad::create([
            'nombre' => 'Alimentos',
            'slug' => 'alimentos',
            'descripcion' => '',
            'area_id' => 3
        ]);

        Especialidad::create([
            'nombre' => 'Laborista clínico',
            'slug' => 'laborista-clinico',
            'descripcion' => '',
            'area_id' => 3
        ]);

        Especialidad::create([
            'nombre' => 'Ecología',
            'slug' => 'ecologia',
            'descripcion' => '',
            'area_id' => 3
        ]);

        Especialidad::create([
            'nombre' => 'Laborista químico',
            'slug' => 'laborista-quimico',
            'descripcion' => '',
            'area_id' => 3
        ]);

        Especialidad::create([
            'nombre' => 'Enfermería',
            'slug' => 'enfermería',
            'descripcion' => '',
            'area_id' => 3
        ]);

    }

}