<?php

namespace Policontacto\Repositorios;

use Policontacto\Entidades\Plantel;

class PlantelRepo extends BaseRepo
{

    public function getModel()
    {
        return new Plantel;
    }

	public function getList()
	{
		return Plantel::lists('nombre', 'id');
	}

} 