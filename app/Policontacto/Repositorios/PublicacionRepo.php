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

		if(isset(\Auth::user()->estudiante->id))
		{			
			return Publicacion::join('tblEstudiante', function($join){
				$join->on('tblPublicacion.usuario_id', '=', 'tblEstudiante.id')->where('tblEstudiante.area_id', '=', \Auth::user()->estudiante->area_id);
			})
			->orderBy('fecha_p', 'desc')
			->get();
		}

		if(isset(\Auth::user()->empresa->id))
		{			
			return Publicacion::join('tblEstudiante', function($join){
				$join->on('tblPublicacion.usuario_id', '=', 'tblEstudiante.id')->where('tblEstudiante.area_id', '=', \Auth::user()->empresa->area_id);
			})
			->orderBy('fecha_p', 'desc')
			->get();
		}

	}

	public function nuevaPublicacion()
	{
		$publicacion = new Publicacion();
		$publicacion->usuario_id = \Auth::user()->id;
		return $publicacion;
}

} 