<?php

namespace Policontacto\Managers;


class CuentaManager extends BaseManager
{

    public function getReglas()
    {
        $reglas = [
            'email' => 'required|email|min:5|Max:40|AlphaNum|unique:tblUsuario,email,' . $this->entidad->id,
            'password' => 'confirmed|min:6|Max:30|AlphaNum',
            'password_confirmation' => 'min:6|Max:30|AlphaNum'
        ];

        return $reglas;
    }

}