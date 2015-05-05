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

Route::get('/', function(){return view('principal');});
Route::get('estudiante/new', 'EstudianteController@index');
Route::post('estudiante/create', 'EstudianteController@crear');

// GET route
Route::get('login', function() {
    return View::make('login');
});

//POST route
Route::post('login', 'AccountController@login');




Route::get('home', 'HomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
