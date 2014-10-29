<?php namespace Policontacto\Entidades;

class Estudiante extends \Eloquent
{
    protected $table = 'tblestudiante';
    protected $fillable = ['area_id', 'especialidad_id', 'plantel_id', 'nombre', 'apellidos', 'curriculum', 'fecha', 'serv', 'empleo'];

    public function user()
    {
        return $this->hasOne('Policontacto\Entidades\User', 'id', 'id');
    }

    public function area()
    {
        return $this->belongsTo('Policontacto\Entidades\Area');
    }

}