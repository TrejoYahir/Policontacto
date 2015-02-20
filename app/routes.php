<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

//Autentificación

Route::group(['before' => 'guest'],  function(){

	Route::post('registro', ['as' => 'registro', 'uses' => 'UsersController@registro']);
	Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);

});

//Edición
Route::group(['before' => 'auth'],  function(){

	Route::get('areas/{slug}/{id}', ['as' => 'area', 'uses' => 'AreaController@area']);
    Route::get('{slug}/{id}', ['as' => 'estudiante', 'uses' => 'AreaController@estudiante']);
    Route::get('empresa/{slug}/{id}', ['as' => 'empresa', 'uses' => 'AreaController@empresa']);

	Route::get('cuenta', ['as' => 'cuenta', 'uses' => 'UsersController@cuenta']);
	Route::put('cuenta', ['as' => 'cambiarCuenta', 'uses' => 'UsersController@cambiarCuenta']);
	Route::get('perfil', ['as' => 'perfil', 'uses' => 'UsersController@perfil']);
	Route::put('perfil', ['as' => 'cambiarPerfil', 'uses' => 'UsersController@cambiarPerfil']);
	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
	Route::post('publicar', ['as' => 'publicar', 'uses' => 'UsersController@publicar']);
	Route::get('posts', ['as' => 'obtenerPublicaciones', 'uses' => 'UsersController@obtenerPublicaciones']);

	//admin
	Route::group(['before' => 'isAdmin'],  function(){
		Route::get('admin/estudiante/{id}', ['as' => 'editarEstudiante', function($id){
			return $id;
		}]);
	});

});

