<?php namespace Policontacto\Entidades;

use Illuminate\Database\Eloquent\SoftDeletingTrait;   

class Vacante extends \Eloquent
{

    use SoftDeletingTrait;
    
    protected $dates = ['deleted_at'];
    protected $table = 'ctgVacante';
    protected $fillable = ['nombre', 'descripcion'];

    public function empresa()
    {
        return $this->belongsTo('Policontacto\Entidades\Empresa', 'empresa_id', 'id');
    }

    public function publicacion()
    {
        return $this->hasOne('Policontacto\Entidades\Publicacion', 'id', 'publicacion_id');
    }

}