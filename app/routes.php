<?php

if(isset(Auth::user()->estudiante->nombre) || isset(Auth::user()->empresa->nombre)) {
	Route::get('/', ['as' => 'home', 'uses' => 'UsersController@novedades']);
}
else {
	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
}

//Todos
Route::group(['before' => 'guest'],  function(){
	
	Route::get('empresa', ['as' => 'empresa-r', 'uses' => 'UsersController@empresa']);
	Route::post('registro/empresa', ['as' => 'registroEmpresa', 'uses' => 'UsersController@registroEmpresa']);
	Route::post('registro', ['as' => 'registro', 'uses' => 'UsersController@registro']);
	Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
	Route::get('registro/v/{confirmationCode}', ['as' => 'confirmacion', 'uses' => 'UsersController@confirmar']);
	Route::get('registro/v/e/{confirmationCode}', ['as' => 'confirmacionEmpresa', 'uses' => 'UsersController@confirmarEmpresa']);

});

//Acceso solo con autentificación
Route::group(['before' => 'auth'],  function(){

	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
	Route::post('publicar', ['as' => 'publicar', 'uses' => 'UsersController@publicar']);
	Route::get('posts', ['as' => 'obtenerPublicaciones', 'uses' => 'UsersController@obtenerPublicaciones']);
	Route::get('posts/usuario/{id}', ['as' => 'obtenerPublicacionesExternas', 'uses' => 'UsersController@obtenerPublicacionesExternas']);
	Route::get('a/{slug}', ['as' => 'area', 'uses' => 'AreaController@area']);
	Route::get('u/{slug}', ['as' => 'estudiante', 'uses' => 'AreaController@estudiante']);
	Route::get('e/{slug}', ['as' => 'empresa', 'uses' => 'AreaController@empresa']);
	Route::get('buscar', ['as' => 'buscar', 'uses' => 'UsersController@buscar']);
	Route::get('mensajes/{usuario}', ['as' => 'mensajes', 'uses' => 'UsersController@chat']);
	Route::post('chat/enviarMensaje', ['as' => 'enviarMensaje', 'uses' => 'UsersController@enviarMensaje']);
	Route::post('chat/getmensajes', ['as' => 'getMensajes', 'uses' => 'UsersController@getMensajes']);

	Route::get('cuenta', ['as' => 'cuenta', 'uses' => 'UsersController@cuenta']);
	Route::put('cuenta', ['as' => 'cambiarCuenta', 'uses' => 'UsersController@cambiarCuenta']);

	//solo estudiantes
	Route::group(['before' => 'esEstudiante'],  function(){
		
		Route::get('perfil', ['as' => 'perfil', 'uses' => 'UsersController@perfil']);
		Route::put('perfil', ['as' => 'cambiarPerfil', 'uses' => 'UsersController@cambiarPerfil']);

	});

	//solo empresas
	Route::group(['before' => 'esEmpresa'],  function(){
		
		Route::get('em/perfil', ['as' => 'perfilEmpresa', 'uses' => 'UsersController@perfilEmpresa']);
		Route::put('em/perfil', ['as' => 'cambiarPerfilEmpresa', 'uses' => 'UsersController@cambiarPerfilEmpresa']);
		
	});

	//admin
	Route::group(['before' => 'isAdmin'],  function(){
		Route::get('admin/estudiante/{id}', ['as' => 'editarEstudiante', function($id){
			return $id;
		}]);
	});

});

