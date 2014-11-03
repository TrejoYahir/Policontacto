<?php

namespace Policontacto\Managers;


class RegistroManager extends BaseManager
{

    public function getReglas()
    {
        $reglas = [
            'email' => 'required|email|unique:tblUsuario,email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ];

        return $reglas;
    }

}