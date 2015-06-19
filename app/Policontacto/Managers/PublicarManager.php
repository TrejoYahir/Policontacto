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
		$groserias = array("puta","joder","coño","verga","bitch","fuck","idiota","estupido","estúpido","puto","mierda","pendejo","gilipollas","cagon","cagones","cagar","chinga","chingo","chingón","chingó");

		$data['fecha_p'] = date('Y-m-d H:i:s');

		if($data['contenido'] != strip_tags($data['contenido'])) {
			$data['contenido'] = "Publicacion bloqueada debido inserción de código malicioso.";
			$data['marcada'] = true;
		}

		if(0 < count(array_intersect(explode(' ', strtolower($data['contenido'])), $groserias)))
		{
			$data['contenido'] = "Publicación bloqueada por lenguaje ofensivo";
			$data['marcada'] = true;
		}

		return $data;
	}

	public function contains($str, array $arr)
	{
		foreach($arr as $a) {
			if (stripos($str,$a) !== false) return true;
		}
		return false;
	}

}