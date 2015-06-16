<?php

namespace Policontacto\Managers;


class VacanteManager extends BaseManager
{

	public function getReglas()
	{
		$reglas = [
			'descripcion' => 'required|max:500',
			'nombre' => 'required'
		];

		return $reglas;
	}

}