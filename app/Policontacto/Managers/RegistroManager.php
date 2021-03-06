<?php

namespace Policontacto\Managers;


class RegistroManager extends BaseManager
{

    public function getReglas()
    {
        $reglas = [
            'email' => 'required|email|unique:tblUsuario,email|Min:5|Max:40',
            'password' => 'required|confirmed|min:6|Max:30|AlphaNum',
            'password_confirmation' => 'required|min:6|Max:30|AlphaNum'
        ];

        return $reglas;
    }

	public function prepararDatos($data)
	{
		$confirmation_code = str_random(30);
		$this->entidad->confirmation_code = $confirmation_code;

		return $data;
	}

}