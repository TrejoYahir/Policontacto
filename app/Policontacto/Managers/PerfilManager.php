<?php

namespace Policontacto\Managers;


class PerfilManager extends BaseManager
{

	public function getReglas()
	{
		$reglas = [
			'area_id' => 'required|exists:ctgarea,id',
			'plantel_id' => 'required|exists:ctgplantel,id',
			'especialidad_id' => 'required|exists:ctgespecialidad,id',
			'nombre' => 'required',
			'apellidos' => 'required',
			'curriculum' => 'required|max:1000',
			'fecha' => '',
			'serv' => '',
			'empleo' => ''
		];

		return $reglas;
	}

}