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

Route::get('estudiante', 'EstudianteController@index');
Route::get('estudiante/new', 'EstudianteController@nuevo');
Route::post('estudiante/create', 'EstudianteController@crear');

Route::get('profesores', 'ProfesorController@index');
Route::get('profesores/new', 'ProfesorController@nuevo');
Route::get('profesores/old/{id}', 'ProfesorController@existente');
Route::get('profesores/destroy/{id}', 'ProfesorController@borrar');

Route::post('profesores/create', 'ProfesorController@crear');
Route::post('profesores/modify/{id}', 'ProfesorController@modificar');

Route::get('cursos', 'CursosController@index');
Route::get('cursos/new', 'CursosController@nuevo');
Route::get('cursos/old/{id}', 'CursosController@existente');
Route::get('cursos/destroy/{id}', 'CursosController@borrar');

Route::post('cursos/create', 'CursosController@crear');
Route::post('cursos/modify/{id}', 'CursosController@modificar');

//rutas usuarios
Route::get('usuarios', 'UsuarioController@imprimirUsuarios');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
