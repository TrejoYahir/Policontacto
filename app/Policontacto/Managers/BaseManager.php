<?php

namespace Policontacto\Managers;

abstract class BaseManager {

    protected $entidad;
    protected $data;
    protected $errors;

    public function  __construct($entidad, $data)
    {

        $this->entidad = $entidad;
        $this->data = array_only($data, array_keys($this->getReglas()));

    }

    abstract public function getReglas();

    public  function isValid()
    {

        $reglas = $this->getReglas();
        $validacion = \Validator::make($this->data, $reglas);
        $isValid = $validacion->passes();
        $this->errors = $validacion->messages();

        return $isValid;

    }

    public function save()
    {

        if(!$this->isValid()) {
            return false;
        }

        $this->entidad->fill($this->data);
        $this->entidad->save();

        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }

}