<?php namespace Policontacto\Entidades;

class Plantel extends \Eloquent
{
    protected $table = 'ctgplantel';
    protected $fillable = [];

	public function estudiantes()
	{
		return $this->hasMany('Policontacto\Entidades\Estudiante');
	}

}