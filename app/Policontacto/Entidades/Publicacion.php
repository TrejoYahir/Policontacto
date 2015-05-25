<?php namespace Policontacto\Entidades;

class Publicacion extends \Eloquent
{
    protected $table = 'tblPublicacion';
    protected $fillable = ['contenido', 'fecha_p', 'tipo'];

    public function user()
    {
        return $this->belongsTo('Policontacto\Entidades\User', 'usuario_id', 'id');
    }

    public function getFechaPAttribute()
    {
    	$date = new \DateTime($this->attributes['fecha_p']);
    	$this->attributes['fecha_p'] = $date->format('F j, Y g:ia');
    	return $this->attributes['fecha_p'];
    }
}