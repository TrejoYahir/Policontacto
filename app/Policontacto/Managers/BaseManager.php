<?php

namespace Policontacto\Managers;

abstract class BaseManager
{

	protected $entidad;
	protected $data;

	public function  __construct($entidad, $data)
	{

		$this->entidad = $entidad;
		$this->data = array_only($data, array_keys($this->getReglas()));

	}

	abstract public function getReglas();

	public function isValid()
	{
		$reglas = $this->getReglas();
		$this->data = $this->hacerCambios($this->data);
		$validacion = \Validator::make($this->data, $reglas);

		if($validacion->fails()){
			throw new ExcepcionesValidacion('validación fallida', $validacion->messages());
		}
	}

	public function prepararDatos($data)
	{
		return $data;
	}

	public function hacerCambios($data)
	{
		return $data;
	}

	public function save()
	{

		$this->isValid();
		$this->entidad->fill($this->prepararDatos($this->data));
		$this->entidad->save();

		return true;
	}

}