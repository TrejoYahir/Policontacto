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
        $validacion = \Validator::make($this->data, $reglas);

	    if($validacion->fails()){
		    throw new ExcepcionesValidacion('validación fallida', $validacion->messages());
	    }
    }

    public function save()
    {

        $this->isValid();
        $this->entidad->fill($this->data);
        $this->entidad->save();

        return true;
    }

}