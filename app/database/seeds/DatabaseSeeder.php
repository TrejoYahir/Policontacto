<?php

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('AreaTableSeeder');
        $this->call('EspecialidadTableSeeder');
        $this->call('PlantelTableSeeder');
        //  $this->call('UsuarioTableSeeder');
        $this->call('EstudianteTableSeeder');
        $this->call('EmpresaTableSeeder');
        //  $this->call('EventoTableSeeder');
        //  $this->call('MensajeTableSeeder');
        //  $this->call('VacanteTableSeeder');
        //  $this->call('PublicacionTableSeeder');

    }

}
