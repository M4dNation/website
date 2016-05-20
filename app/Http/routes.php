<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'web'], function()
{
	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
	Route::get('/login', ['uses' => 'Auth\AuthController@showLoginForm']);
	Route::post('/login', ['uses' => 'Auth\AuthController@login']);
	Route::get('/logout', ['uses' => 'Auth\AuthController@logout']);
});


Route::group(['prefix' => 'home', 'middleware' => ['web']], function()
{
	//Route::get('/jobs', ['as' => 'home.jobs', uses => 'HomeController@jobs']);
	
});


Route::group(['prefix' => 'dashboard', 'middleware' => ['web', 'auth']], function ()
{
	Route::get('/',  ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

});

