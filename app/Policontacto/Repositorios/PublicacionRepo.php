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

	public function getAll()
	{
		
			return Publicacion::all();

	}

	public function nuevaPublicacion()
	{
		$publicacion = new Publicacion();
		$publicacion->usuario_id = \Auth::user()->id;
		return $publicacion;
	}

} 