<?php namespace Policontacto\Entidades;

class Area extends \Eloquent
{
    protected $table = 'ctgArea';
    protected $fillable = [];

    public function estudiantes()
    {
        return $this->hasMany('Policontacto\Entidades\Estudiante');
    }

    public function empresas()
    {
        return $this->hasMany('Policontacto\Entidades\Empresa');
    }

    public function especialidades()
    {
        return $this->hasMany('Policontacto\Entidades\Especialidad');
    }

    public function planteles()
    {
        return $this->hasMany('Policontacto\Entidades\Plantel');
    }

}