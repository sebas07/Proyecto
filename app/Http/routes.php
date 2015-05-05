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
Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::get('estudiante/new', 'EstudianteController@index');
Route::post('estudiante/create', 'EstudianteController@crear');

<<<<<<< HEAD
Route::get('profesores/new', 'ProfesorController@nuevo');
Route::post('profesores/create', 'ProfesorController@crear');
=======
//rutas usuarios
Route::get('usuarios', 'UsuarioController@imprimirUsuarios');
>>>>>>> origin/master

Route::get('cursos/new', 'CursosController@nuevo');
Route::post('cursos/create', 'CursosController@crear');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
