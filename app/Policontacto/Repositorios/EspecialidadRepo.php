<?php

namespace Policontacto\Repositorios;

use Policontacto\Entidades\Especialidad;

class EspecialidadRepo extends BaseRepo
{

    public function getModel()
    {
        return new Especialidad;
    }

	public function getList()
	{
		return Especialidad::orderBy('nombre', 'DESC')->lists('nombre', 'id');
	}

} 