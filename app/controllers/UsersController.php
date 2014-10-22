<?php

use Policontacto\Entidades\User;

class UsersController extends BaseController {

    public function registro()
    {

        $data = Input::only(['email', 'password', 'password_confirmation']);
        $reglas = [
            'email'                               => 'required|email|unique:tblusuario,email',
            'password'                       => 'required|confirmed',
            'password_confirmation' => 'required'
        ];

        $validacion = \Validator::make($data, $reglas);

        if($validacion->passes()) {

            $user = new User($data);
            $user->save();
            return Redirect::route('home');

        }

         return Redirect::back()->withInput()->withErrors($validacion->messages());

    }

} 