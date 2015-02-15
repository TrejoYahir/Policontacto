<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

//Listas
Route::get('areas/{slug}', ['as' => 'area', 'uses' => 'AreaController@area']);
Route::get('{slug}', ['as' => 'estudiante', 'uses' => 'AreaController@estudiante']);
Route::get('empresa/{slug}', ['as' => 'empresa', 'uses' => 'AreaController@empresa']);

//Autentificación

Route::group(['before' => 'guest'],  function(){

	Route::post('registro', ['as' => 'registro', 'uses' => 'UsersController@registro']);
	Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);

});

//Edición
Route::group(['before' => 'auth'],  function(){

	Route::get('cuenta', ['as' => 'cuenta', 'uses' => 'UsersController@cuenta']);
	Route::put('cuenta', ['as' => 'cambiarCuenta', 'uses' => 'UsersController@cambiarCuenta']);
	Route::get('perfil', ['as' => 'perfil', 'uses' => 'UsersController@perfil']);
	Route::put('perfil', ['as' => 'cambiarPerfil', 'uses' => 'UsersController@cambiarPerfil']);
	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

	//admin
	Route::group(['before' => 'isAdmin'],  function(){
		Route::get('admin/estudiante/{id}', ['as' => 'editarEstudiante', function($id){
			return $id;
		}]);
	});

});

