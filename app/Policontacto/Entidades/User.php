<?php namespace Policontacto\Entidades;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    protected $table = 'tblUsuario';

    protected $hidden = array('password', 'remember_token');

    protected $fillable = array('email', 'password');

    public function setPasswordAttribute($val)
    {
	    if(! empty($val))
	    {
		    $this->attributes['password'] = \Hash::make($val);
	    }
    }

	public function estudiante()
	{
		return $this->hasOne('Policontacto\Entidades\Estudiante', 'id', 'id');
	}

	public function empresa()
	{
		return $this->hasOne('Policontacto\Entidades\Empresa', 'id', 'id');
	}

	public function getEstudiante()
	{

		$estudiante = $this->estudiante;

		if(is_null($estudiante)) {
			$estudiante = new Estudiante();
			$estudiante->id = $this->id;
		}
		return $estudiante;

	}

	public function getEmpresa()
	{

		$empresa = $this->empresa();

		if(is_null($empresa)) {
			$empresa = new Empresa();
			$empresa->id = $this->id;
		}

		return $empresa;

	}

}
