<?php namespace Policontacto\Entidades;

class Empresa extends \Eloquent
{
    protected $table = 'tblEmpresa';
    protected $fillable = [];

    public function user()
    {
        return $this->hasOne('Policontacto\Entidades\User', 'id', 'id');
    }

    public function area()
    {
        return $this->belongsTo('Policontacto\Entidades\Area');
    }

}