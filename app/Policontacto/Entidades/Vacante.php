<?php namespace Policontacto\Entidades;

class Vacante extends \Eloquent
{
    protected $table = 'ctgVacante';
    protected $fillable = ['nombre', 'descripcion'];

    public function empresa()
    {
        return $this->belongsTo('Policontacto\Entidades\Empresa', 'empresa_id', 'id');
    }

}