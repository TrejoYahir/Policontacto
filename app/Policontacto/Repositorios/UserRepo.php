<?php

namespace Policontacto\Repositorios;

use Policontacto\Entidades\User;

class UserRepo extends BaseRepo
{

	public function getModel()
	{
			return new User;
	}

	public function getAll()
	{

		return User::all();
	}

	public function actualizar($faltas)
	{
		return User::where('id', '=', \Auth::user()->id)->update(array('marcadas' => $faltas));

	}

} 