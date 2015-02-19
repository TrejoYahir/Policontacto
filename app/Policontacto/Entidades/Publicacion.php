<?php namespace Policontacto\Entidades;

class Publicacion extends \Eloquent
{
    protected $table = 'tblPublicacion';
    protected $fillable = ['contenido', 'fecha', 'texto'];

    public function user()
    {
        return $this->belongsTo('Policontacto\Entidades\User', 'usuario_id', 'id');
    }
}