<?php

namespace Policontacto\Managers;


class PublicarManager extends BaseManager
{

	public function getReglas()
	{
		$reglas = [
			'contenido' => 'required|max:500'
		];

		return $reglas;
	}

	public function hacerCambios($data)
	{

		$data['fecha'] = date('Y-m-d H:i:s');
		$data['tipo'] = 'texto'; 

		return $data;
	}

}