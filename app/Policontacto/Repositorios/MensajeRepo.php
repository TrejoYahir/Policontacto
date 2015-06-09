<?php

namespace Policontacto\Repositorios;

use Policontacto\Entidades\Mensaje;
use Policontacto\Entidades\User;

class MensajeRepo extends BaseRepo
{

    public function getModel()
    {
        return new Mensaje;
    }

    public function nuevoMensaje()
	{
		$tipo = getUserType();
		$mensaje = new Mensaje();
		$mensaje->usuario_id = \Auth::user()->id;
		$mensaje->remitente= \Auth::user()->$tipo->slug;
		return $mensaje;
	}

	public function getNuevosMensajes($remitente)
	{
		$tipo = getUserType();
		 return Mensaje::where('remitente', '=', $remitente)->where('destinatario', '=', \Auth::user()->$tipo->slug)->where('leido', '=', false)->first();
	}

	public function getLista($remitente, $destinatario)
	{
		return Mensaje::where('remitente', '=', $remitente)->where('destinatario', '=',$destinatario)->orWhere('destinatario', '=',$remitente)->where('remitente', '=',$destinatario)->get();
	}

}