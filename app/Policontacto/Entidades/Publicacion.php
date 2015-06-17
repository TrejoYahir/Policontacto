<?php namespace Policontacto\Entidades;

use Illuminate\Database\Eloquent\SoftDeletingTrait;   

class Publicacion extends \Eloquent
{
    
    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    protected $table = 'tblPublicacion';
    protected $fillable = ['contenido', 'fecha_p', 'tipo'];

    public function user()
    {
        return $this->belongsTo('Policontacto\Entidades\User', 'usuario_id', 'id');
    }

    public function vacante()
    {
        return $this->hasOne('Policontacto\Entidades\Vacante', 'publicacion_id', 'id');
    }

    public function getFechaPAttribute()
    {
    	$date = new \DateTime($this->attributes['fecha_p']);
    	$this->attributes['fecha_p'] = $date->format('F j, Y g:ia');
    	return $this->attributes['fecha_p'];
    }
}