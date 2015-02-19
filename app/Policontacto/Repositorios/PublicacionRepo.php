<?php

namespace Policontacto\Repositorios;

use Policontacto\Entidades\Publicacion;

class PublicacionRepo extends BaseRepo
{

    public function getModel()
    {
        return new Publicacion;
    }

	public function getList()
	{
		return Publicacion::lists('contenido', 'id', 'url_archivo', 'fecha');
	}

	public function nuevaPublicacion()
    {
        $publicacion = new Publicacion();
        $publicacion->usuario_id = \Auth::user()->id;
        return $publicacion;
    }

} 