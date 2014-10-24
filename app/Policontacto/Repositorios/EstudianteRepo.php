<?php

namespace Policontacto\Repositorios;
use Policontacto\Entidades\Estudiante;
use Policontacto\Entidades\User;

class EstudianteRepo extends BaseRepo {

    public function getModel()
    {
        return new Estudiante;
    }

    public function nuevoEstudiante()
    {
        $user = new User();
        return $user;
    }

}