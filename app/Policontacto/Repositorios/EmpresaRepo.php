<?php

namespace Policontacto\Repositorios;

use Policontacto\Entidades\Empresa;

class EmpresaRepo extends BaseRepo
{

    public function getModel()
    {
        return new Empresa;
    }

}