<?php

if(isset(Auth::user()->estudiante->nombre)) {
	Route::get('/', ['as' => 'home', 'uses' => 'UsersController@novedades']);
}
else {
	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
}

//Autentificación
Route::group(['before' => 'guest'],  function(){
	
	Route::post('registro', ['as' => 'registro', 'uses' => 'UsersController@registro']);
	Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
	Route::get('registro/v/{confirmationCode}', ['as' => 'confirmation_path', 'uses' => 'UsersController@confirmar']);

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
	Route::get('a/{slug}', ['as' => 'area', 'uses' => 'AreaController@area']);
	Route::get('u/{slug}', ['as' => 'estudiante', 'uses' => 'AreaController@estudiante']);
	Route::get('e/{slug}', ['as' => 'empresa', 'uses' => 'AreaController@empresa']);
	Route::get('buscar', ['as' => 'buscar', 'uses' => 'UsersController@buscar']);

	//admin
	Route::group(['before' => 'isAdmin'],  function(){
		Route::get('admin/estudiante/{id}', ['as' => 'editarEstudiante', function($id){
			return $id;
		}]);
	});

});

