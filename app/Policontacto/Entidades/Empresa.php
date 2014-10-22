<?php namespace Policontacto\Entidades;

class Empresa extends \Eloquent {
    protected $table = 'tblempresa';
	protected $fillable = [];

    public function user()
    {
        return $this->hasOne('Policontacto\Entidades\User', 'id', 'usuario_id');
    }

    public  function area()
    {
        return $this->belongsTo('Policontacto\Entidades\Area');
    }

}