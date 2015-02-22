<?php

class AuthController extends BaseController
{

    public function login()
    {
        $data = Input::only('email', 'password', 'remember');

        $credenciales = ['email' => $data['email'], 'password' => $data['password']];

        if (Auth::attempt($credenciales, $data['remember'])) {
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