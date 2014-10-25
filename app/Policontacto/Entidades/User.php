<?php namespace Policontacto\Entidades;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    protected $table = 'tblusuario';

    protected $hidden = array('password', 'remember_token');

    protected $fillable = array('email', 'password');

    public function setPasswordAttribute($val)
    {
        $this->attributes['password'] = \Hash::make($val);
    }

}
