<?php

namespace Policontacto\Managers;


class ExcepcionesValidacion extends \Exception{

	protected $errores;

	public function __construct($mensaje, $errores)
	{
		$this->errores = $errores;
		parent::__construct($mensaje);
	}

	public function getErrors()
	{
		return $this->errores;
	}

} 