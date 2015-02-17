<?php

namespace Policontacto\Managers;


class PerfilManager extends BaseManager
{

	public function getReglas()
	{
		$reglas = [
			'area_id' => 'required|exists:ctgArea,id',
			'plantel_id' => 'required|exists:ctgPlantel,id',
			'especialidad_id' => 'required|exists:ctgEspecialidad,id',
			'nombre' => 'required',
			'apellidos' => 'required',
			'curriculum' => 'required|max:2000',
			'fecha' => 'required',
			'serv' => '',
			'empleo' => '',
			'genero' => 'required|in:Masculino,Femenino',
			'url_foto' => 'max:6000|mimes:jpg,png,jpeg'
		];

		return $reglas;
	}

	public function prepararDatos($data)
	{

		if(!isset($data['serv'])) {
			$data['serve'] = 0;
		}

		if(!isset($data['empleo'])) {
			$data['empleo'] = 0;
		}

		$nombreCompleto = $data['nombre'] . " " . $data['apellidos'];
		$this->entidad->slug = \Str::slug($nombreCompleto);

		return $data;
	}

}