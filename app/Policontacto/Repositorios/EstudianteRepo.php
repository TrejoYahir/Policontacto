<?php

namespace Policontacto\Repositorios;
use Policontacto\Entidades\Estudiante;

class EstudianteRepo extends BaseRepo {

    public function getModel()
    {
        return new Estudiante;
    }

}