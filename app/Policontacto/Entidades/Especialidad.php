<?php namespace Policontacto\Entidades;

class Especialidad extends \Eloquent
{
    protected $table = 'ctgEspecialidad';
    protected $fillable = [];

	public function estudiantes()
	{
		return $this->hasMany('Policontacto\Entidades\Estudiante');
	}

}