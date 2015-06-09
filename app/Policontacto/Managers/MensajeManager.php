<?php

namespace Policontacto\Managers;


class MensajeManager extends BaseManager
{

	public function getReglas()
	{
		$reglas = [
			'contenido' => 'required|max:500',
			'destinatario' => 'required',
		];

		return $reglas;
	}

	public function hacerCambios($data)
	{

		$data['fecha'] = date('Y-m-d H:i:s');

		return $data;
	}

}