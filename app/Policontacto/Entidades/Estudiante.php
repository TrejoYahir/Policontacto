<?php namespace Policontacto\Entidades;

class Estudiante extends \Eloquent
{
    protected $table = 'tblEstudiante';
    protected $fillable = ['area_id', 'especialidad_id', 'plantel_id', 'nombre', 'apellidos', 'curriculum', 'fecha', 'serv', 'empleo', 'genero', 'url_foto'];

    public function user()
    {
        return $this->hasOne('Policontacto\Entidades\User', 'id', 'id');
    }

    public function area()
    {
        return $this->belongsTo('Policontacto\Entidades\Area');
    }


    public function setUrlFotoAttribute($val)
    {

        if($val == null)
        {
            if(isset($this->attributes['url_foto']))
            {
                $this->attributes['url_foto'] = $this->attributes['url_foto'];
            }
            else {
                $this->attributes['url_foto'] = 'profile-pics/default-profile-pic.jpg';
            }
        }
        else
        {
            $file = $val;
            $filename = $file->getClientOriginalName();
            $ruta = public_path() . "/profile-pics/";
            $this->attributes['url_foto'] = "profile-pics/" . $filename;
            $file->move($ruta, $filename);
        }
        
    }

    public function getNombreCortoAttribute()
    {
        if(isset($this->attributes['nombre']) && isset($this->attributes['apellidos']))
        {
            $apellidos = explode(' ',$this->attributes['apellidos']);
            $nombres = explode(' ',$this->attributes['nombre']);
            $this->attributes['nombre_corto'] = $nombres[0] . " " . $apellidos[0];
        }
        return $this->attributes['nombre_corto'];
    }

}