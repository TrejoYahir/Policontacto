<?php

class AuthController extends BaseController
{

    public function login()
    {
        $data = Input::only('email', 'password', 'check2');

        $credenciales = ['email' => $data['email'], 'password' => $data['password']];

        if (Auth::attempt($credenciales, $data['check2'])) {
            return Redirect::back();
        }

        return Redirect::back()->with('login_error', 1);

    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('home');
    }

} 