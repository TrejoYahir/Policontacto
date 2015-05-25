<?php

class AuthController extends BaseController
{

    public function login()
    {
        $data = Input::only('email', 'password', 'remember');
        $remember = (Input::has('remember')) ? true : false;

        $credenciales = ['email' => $data['email'], 'password' => $data['password'], 'confirmed' => 1];

        if (Auth::attempt($credenciales, $remember)) {
            return Redirect::home();
        }

        return Redirect::home()->with('login_error', 1);

    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('home');
    }

} 