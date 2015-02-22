<?php

//Inicio
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

//Autentificación

Route::group(['before' => 'guest'],  function(){

	Route::post('registro', ['as' => 'registro', 'uses' => 'UsersController@registro']);
	Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);

});

//Acceso solo con autentificación
Route::group(['before' => 'auth'],  function(){

	Route::get('cuenta', ['as' => 'cuenta', 'uses' => 'UsersController@cuenta']);
	Route::put('cuenta', ['as' => 'cambiarCuenta', 'uses' => 'UsersController@cambiarCuenta']);
	Route::get('perfil', ['as' => 'perfil', 'uses' => 'UsersController@perfil']);
	Route::put('perfil', ['as' => 'cambiarPerfil', 'uses' => 'UsersController@cambiarPerfil']);
	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
	Route::post('publicar', ['as' => 'publicar', 'uses' => 'UsersController@publicar']);
	Route::get('posts', ['as' => 'obtenerPublicaciones', 'uses' => 'UsersController@obtenerPublicaciones']);
	Route::get('posts/usuario/{id}', ['as' => 'obtenerPublicacionesExternas', 'uses' => 'UsersController@obtenerPublicacionesExternas']);
	Route::get('area/{slug}', ['as' => 'area', 'uses' => 'AreaController@area']);
	Route::get('usuario/{slug}', ['as' => 'estudiante', 'uses' => 'AreaController@estudiante']);
	Route::get('empresa/{slug}', ['as' => 'empresa', 'uses' => 'AreaController@empresa']);

	//admin
	Route::group(['before' => 'isAdmin'],  function(){
		Route::get('admin/estudiante/{id}', ['as' => 'editarEstudiante', function($id){
			return $id;
		}]);
	});

});

