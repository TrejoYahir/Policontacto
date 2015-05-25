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

} 