<?php namespace Policontacto\Entidades;

class Plantel extends \Eloquent
{
    protected $table = 'ctgPlantel';
    protected $fillable = [];

	public function estudiantes()
	{
		return $this->hasMany('Policontacto\Entidades\Estudiante');
	}

}