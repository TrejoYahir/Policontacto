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
			'nombre' => 'required|alpha_spaces|min:2|Max:30|',
			'apellidos' => 'required|alpha_spaces|min:2|Max:50|',
			'curriculum' => 'required|max:2000',
			'fecha' => 'required|date',
			'serv' => '',
			'empleo' => '',
			'genero' => 'required|in:Masculino,Femenino',
			'url_foto' => 'max:6000|mimes:jpg,png,jpeg'
		];

		return $reglas;
	}

	public function hacerCambios($data)
	{

		if($data['fecha']['day'] < 10){
			$data['fecha']['day'] = "0".$data['fecha']['day'];
		}

		$data['fecha'] = implode("-", $data['fecha']);

		return $data;
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