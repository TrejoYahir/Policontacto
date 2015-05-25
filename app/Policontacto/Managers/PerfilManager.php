<?php

namespace Policontacto\Managers;
use Policontacto\Entidades\Estudiante;

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
			'descripcion' => 'required|max:500',
			'fecha' => 'required|date',
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

		$slug = $this->generarSlug($data);

		$this->entidad->slug = $slug;

		return $data;
	}

	public function generarSlug($data)
	{
		$nombreCompleto = $data['nombre'] . " " . $data['apellidos'];
		$slug = \Str::slug($nombreCompleto);
		$envi = \App::environment();
		$cuentaSlug = Estudiante::whereRaw("slug ~ '^{$slug}(-[0-9]*)?$'");
		if($envi == 'local')
		{
			$cuentaSlug = Estudiante::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'");
		}

		if ($cuentaSlug->count() === 0) {
	        return $slug;
	    }

	    $ultimoSlug = $cuentaSlug->orderBy('slug', 'desc')->first()->slug;
	    $ultimoNumero = intval(str_replace($slug . '-', '', $ultimoSlug));

	    $slug = $slug . '-' . ($ultimoNumero + 1);

	    return $slug;

	}

}