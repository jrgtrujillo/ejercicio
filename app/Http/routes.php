<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth/login');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Rutas para registro de usuarios

Route::resource('usuario', 'UsuarioController');

// Rutas para ajax
Route::get('pais', 'UsuarioController@listing');
Route::get('departamentos/{id}', 'UsuarioController@obtenerdepartamentos');
Route::get('ciudades/{id}', 'UsuarioController@obtenerCiudades');
