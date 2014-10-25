<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

//Listas
Route::get('areas/{slug}/{id}', ['as' => 'area', 'uses' => 'AreaController@area']);
Route::get('{slug}/{id}', ['as' => 'estudiante', 'uses' => 'AreaController@estudiante']);
Route::get('empresa/{slug}/{id}', ['as' => 'empresa', 'uses' => 'AreaController@empresa']);

//Autentificación
Route::post('registro', ['as' => 'registro', 'uses' => 'UsersController@registro']);
Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);