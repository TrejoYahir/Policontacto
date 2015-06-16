<?php

namespace Policontacto\Repositorios;

use Policontacto\Entidades\Vacante;
use Policontacto\Entidades\Empresa;

class VacanteRepo extends BaseRepo
{

	public function getModel()
	{
			return new Vacante;
	}

	public function getList()
	{
		return Vacante::lists('descripcion', 'nombre', 'id');
	}

	public function getAll()
	{
		
			return Vacante::all();

	}

	public function nuevaVacante()
	{
		$vacante = new Vacante();
		$vacante->empresa_id = \Auth::user()->empresa->id;
		return $vacante;
	}

} 