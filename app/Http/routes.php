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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',  ['as' => 'signup', 'uses' => 'Controller@signup']);
Route::get('/login',  ['as' => 'login', 'uses' => 'Controller@login']);
Route::get('/logout',  ['as' => 'logout', 'uses' => 'Controller@logout']);
Route::get('/lostpassword',  ['as' => 'lostpassword', 'uses' => 'Controller@lostpassword']);


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['prefix' => 'dashboard', 'middleware' => ['web']], function ()
{
  Route::get('/',  ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
});

Route::group(['prefix' => 'forum', 'middleware' => ['web']], function()
{
  Route::get('/',  ['as' => 'forum', 'uses' => 'ForumController@index']);
  Route::get('/{category}', ['as' => 'category', 'uses' => 'ForumController@getThreads']);
  Route::get('/{category}/{thread}', ['as' => 'category.thread', 'uses' => 'ForumController@getThread']);

});

Route::group(['prefix' => 'docs', 'middleware' => ['web']], function()
{
  Route::get('/',  ['as' => 'docs', 'uses' => 'DocsController@index']);
});
