<?php namespace Policontacto\Entidades;

class Estudiante extends \Eloquent
{
    protected $table = 'tblEstudiante';
    protected $fillable = ['area_id', 'especialidad_id', 'plantel_id', 'nombre', 'apellidos', 'curriculum', 'fecha', 'serv', 'empleo', 'genero'];

    public function user()
    {
        return $this->hasOne('Policontacto\Entidades\User', 'id', 'id');
    }

    public function area()
    {
        return $this->belongsTo('Policontacto\Entidades\Area');
    }

	public function setFechaAttribute($val)
	{
		if($val['day'] < 10){
			$val['day'] = "0".$val['day'];
		}

		$this->attributes['fecha'] = implode("-", $val);
	}

}