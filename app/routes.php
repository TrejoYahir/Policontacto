<?php

Route::get('/', ['as' => 'home', 'uses' =>'HomeController@index']);

Route::get('areas/{slug}/{id}', ['as' => 'area', 'uses' =>'AreaController@area']);

Route::get('{slug}/{id}', ['as' => 'estudiante', 'uses' =>'AreaController@estudiante']);

Route::get('empresa/{slug}/{id}', ['as' => 'empresa', 'uses' =>'AreaController@empresa']);

Route::post('/', ['as' => 'registro', 'uses' =>'UsersController@registro']);