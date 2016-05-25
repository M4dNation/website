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

	Route::get('/blog', ['as' => 'blog', 'uses' => 'BlogController@index']);
	Route::get('/blog/{id}', ['as' => 'blog.article', 'uses' => 'BlogController@showArticle'])->where('id', '[0-9]+');
	Route::get('/login', ['uses' => 'Auth\AuthController@showLoginForm']);
	Route::post('/login', ['uses' => 'Auth\AuthController@login']);
	Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

	Route::get('/jobs', ['as' => 'home.jobs', 'uses' => 'HomeController@job']);
	Route::get('/legal' ,['as' => 'home.legal', 'uses' => 'HomeController@legal']);

	Route::get('/jobs', ['as' => 'home.jobs', 'uses' => 'HomeController@job']);

	Route::group(['prefix' => 'dashboard', 'middleware' => ['web', 'auth']], function ()
	{
		Route::get('/',  ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
		Route::get('/blog',  ['as' => 'dashboard.blog', 'uses' => 'DashboardController@blog']);
		Route::get('/user', ['as' => 'dashboard.user', 'uses' => 'DashboardController@user']);
		Route::post('/user', ['as' => 'dashboard.new.user', 'uses' => 'DashboardController@createUser']);
		Route::get('/user/{id}', ['as' => 'dashboard.edit.user', 'uses' => 'DashboardController@editUser']);
		Route::post('/user/{id}', ['as' => 'dashboard.save.user', 'uses' => 'DashboardController@saveUser']);
		//Route::get('/user/delete/{id}', ['as' => 'dashboard.delete.user', 'uses' => 'DashboardController@deleteUser']);
		Route::get('/users', ['as' => 'dashboard.users', 'uses' => 'DashboardController@users']);
	});
});




