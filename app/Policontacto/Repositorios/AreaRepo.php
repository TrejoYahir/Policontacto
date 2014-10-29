<?php

namespace Policontacto\Repositorios;

use Policontacto\Entidades\Area;

class AreaRepo extends BaseRepo
{

    public function getModel()
    {
        return new Area;
    }

	public function getList()
	{
		return Area::lists('nombre', 'id');
	}

} 