<?php namespace Policontacto\Entidades;

class Empresa extends \Eloquent
{
    protected $table = 'tblEmpresa';
    protected $fillable = ['area_id', 'nombre', 'ubicacion', 'descripcion', 'url_foto'];

    public function user()
    {
        return $this->hasOne('Policontacto\Entidades\User', 'id', 'id');
    }

    public function area()
    {
        return $this->belongsTo('Policontacto\Entidades\Area');
    }

   public function vacantes()
    {
        return $this->hasMany('Policontacto\Entidades\Vacante', 'empresa_id', 'id')->orderBy('created_at', 'DESC');
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
                $this->attributes['url_foto'] = 'profile-pics/default-profile-pic' .rand(1, 3). '.png';
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

}