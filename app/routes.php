<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('login');
});


/*
	Rutas para el Login
*/
Route::get('login', 'AuthenticationController@login');

Route::post('login', 'AuthenticationController@auth');

Route::get('logout', function(){
	Auth::logout();
	return Redirect::to('login');
});

/*
	Rutas del sistema filtradas para usuarios logueados
*/

Route::group(array('before'=>'auth'), function(){

	Route::resource('vehicles', 'VehiclesController');
	Route::resource('reviews', 'ReviewsController');

});

