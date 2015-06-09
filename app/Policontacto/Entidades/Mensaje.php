<?php namespace Policontacto\Entidades;

class Mensaje extends \Eloquent
{
    protected $table = 'tblMensaje';
    protected $fillable = ['contenido', 'destinatario', 'fecha'];

    public function user()
    {
        return $this->belongsTo('Policontacto\Entidades\User', 'usuario_id', 'id');
    }
    
}