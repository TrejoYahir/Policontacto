<?php

namespace Policontacto\Managers;
use Policontacto\Entidades\Empresa;

class EmpresaPerfilManager extends BaseManager
{

	public function getReglas()
	{
		$reglas = [
			'area_id' => 'required|exists:ctgArea,id',
			'nombre' => 'required|alpha_spaces|min:2|Max:100|',
			'descripcion' => 'required|max:500',
			'ubicacion' => 'required',
			'url_foto' => 'max:6000|mimes:jpg,png,jpeg'
		];

		return $reglas;
	}

	public function prepararDatos($data)
	{

		if(!isset($this->entidad->slug))
		{
			$slug = $this->generarSlug($data);
			$this->entidad->slug = $slug;			
		}
		return $data;
	}

	public function generarSlug($data)
	{
		$nombre = $data['nombre'];
		$slug = \Str::slug($nombre);
		$envi = \App::environment();
		$cuentaSlug = Empresa::whereRaw("slug ~ '^{$slug}(-[0-9]*)?$'");
		if($envi == 'local')
		{
			$cuentaSlug = Empresa::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'");
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