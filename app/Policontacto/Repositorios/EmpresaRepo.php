<?php

namespace Policontacto\Repositorios;

use Policontacto\Entidades\Empresa;
use Policontacto\Entidades\User;

class EmpresaRepo extends BaseRepo
{

    public function getModel()
    {
        return new Empresa;
    }

    public function nuevaEmpresa()
    {
        $user = new User();
        return $user;
    }

}