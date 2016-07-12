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
		Route::get('/user', ['as' => 'dashboard.user', 'uses' => 'DashboardController@user']);
		Route::post('/user', ['as' => 'dashboard.new.user', 'uses' => 'DashboardController@createUser']);
		Route::get('/user/{id}', ['as' => 'dashboard.edit.user', 'uses' => 'DashboardController@editUser']);
		Route::post('/user/{id}', ['as' => 'dashboard.save.user', 'uses' => 'DashboardController@saveUser']);
		//Route::get('/user/delete/{id}', ['as' => 'dashboard.delete.user', 'uses' => 'DashboardController@deleteUser']);
		Route::get('/users', ['as' => 'dashboard.users', 'uses' => 'DashboardController@users']);


		Route::get('/article', ['as' => 'dashboard.article', 'uses' => 'DashboardController@article']);
		Route::post('/article', ['as' => 'dashboard.new.article', 'uses' => 'DashboardController@createArticle']);
		Route::get('/article/{id}', ['as' => 'dashboard.edit.article', 'uses' => 'DashboardController@editArticle']);
		Route::get('/article/publish/{id}', ['as' => 'dashboard.publish.article', 'uses' => 'DashboardController@publishArticle']);
		Route::get('/article/draft/{id}', ['as' => 'dashboard.draft.article', 'uses' => 'DashboardController@draftArticle']);
		Route::post('/article/{id}', ['as' => 'dashboard.save.article', 'uses' => 'DashboardController@saveArticle']);
		Route::get('/article/preview/{id}', ['as' => 'dashboard.preview.article', 'uses' => 'DashboardController@previewArticle']);
		//Route::get('/article/delete/{id}', ['as' => 'dashboard.delete.article', 'uses' => 'DashboardController@deleteArticle']);
		Route::get('/articles', ['as' => 'dashboard.articles', 'uses' => 'DashboardController@articles']);
	});

	Route::group(['prefix' => 'api', 'middleware' => ['web']], function()
	{
		Route::get('/', ['as' => 'api', 'uses' => 'AjaxController@index']);
		Route::get('/fmtree', ['as' => 'api.fmtree', 'uses' => 'AjaxController@fm_getTree']);
		Route::get('/fmmkdir', ['as' => 'api.fmmkdir', 'uses' => 'AjaxController@fm_mkdir']);
		Route::get('/fmrmdir', ['as' => 'api.fmrmdir', 'uses' => 'AjaxController@fm_rmdir']);
		Route::get('/fmrm', ['as' => 'api.fmrm', 'uses' => 'AjaxController@fm_rm']);
		Route::post('/fmtouch', ['as' => 'api.fmtouch', 'uses' => 'AjaxController@fm_touch']);
	});
});




