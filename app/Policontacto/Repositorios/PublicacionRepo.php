<?php

namespace Policontacto\Repositorios;

use Policontacto\Entidades\Publicacion;
use Policontacto\Entidades\Estudiante;

class PublicacionRepo extends BaseRepo
{

	public function getModel()
	{
			return new Publicacion;
	}

	public function getList()
	{
		return Publicacion::lists('contenido', 'id', 'url_archivo', 'fecha_p');
	}

	public function getAll($area_id)
	{
		
			return Publicacion::where('area_id', '=', $area_id)->orderBy('fecha_p', 'desc')->simplePaginate(25);

	}

	public function getWheres($ordenar)
	{
		
			return Publicacion::where('tipo', '=', $ordenar)->orderBy('fecha_p', 'desc')->simplePaginate(25);

	}

	public function getFromEmpresa()
	{
		
			return Publicacion::where('tipo', '=', 'empresa')->orWhere('tipo', '=', 'vacante')->orderBy('fecha_p', 'desc')->simplePaginate(25);

	}

	public function actualizar()
	{
			$tipow = getUserType();
			return Publicacion::where('usuario_id', '=', \Auth::user()->id)->update(array('area_id' => \Auth::user()->$tipow->area_id));

	}


	public function nuevaPublicacion()
	{
		$tipow = getUserType();
		$publicacion = new Publicacion();
		$publicacion->usuario_id = \Auth::user()->id;
		$publicacion->area_id = \Auth::user()->$tipow->area_id;
		return $publicacion;
	}

} 