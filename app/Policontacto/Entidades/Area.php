<?php namespace Policontacto\Entidades;

class Area extends \Eloquent {
    protected $table = 'ctgarea';
	protected $fillable = [];

    public function estudiantes()
    {
        return $this->hasMany('Policontacto\Entidades\Estudiante');
    }

    public function empresas()
    {
        return $this->hasMany('Policontacto\Entidades\Empresa');
    }

}