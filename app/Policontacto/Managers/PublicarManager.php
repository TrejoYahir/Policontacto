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

	public function prepararDatos($data)
	{
		$data['tipo'] = 'texto'; 
		
		return $data;
	}

	public function hacerCambios($data)
	{

		$data['fecha'] = date('Y-m-d H:i:s');		

		return $data;
	}

}