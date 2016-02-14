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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/register',  ['as' => 'signup', 'uses' => 'HomeController@register']);
Route::get('/login',  ['as' => 'login', 'uses' => 'HomeController@login']);
Route::get('/logout',  ['as' => 'logout', 'uses' => 'HomeController@logout']);
Route::post('/lostpassword',  ['as' => 'lostpassword', 'uses' => 'HomeController@lostpassword']);
Route::get('/user' , ['as' => 'profile', 'uses' => 'HomeController@profile']);
Route::post('/user', ['as' => 'profile.new', 'uses' => 'HomeController@newProfile']);
Route::put('/user', ['as' => 'profile.update', 'uses' => 'HomeController@updateProfile']);
Route::delete('/user', ['as' => 'profile.delete', 'uses' => 'HomeController@deleteProfile']);


Route::group(['prefix' => 'dashboard', 'middleware' => ['web']], function ()
{
  Route::get('/',  ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
});

Route::group(['prefix' => 'forum', 'middleware' => ['web']], function()
{
  Route::get('/',  ['as' => 'forum', 'uses' => 'ForumController@index']);
  Route::get('/{category}', ['as' => 'category', 'uses' => 'ForumController@getThreads']);
  Route::get('/{category}/{thread}', ['as' => 'category.thread', 'uses' => 'ForumController@getThread']);
  Route::post('/{category}/{thread}', ['as' => 'category.thread.post', 'uses' => 'ForumController@newPost']);
  Route::put('/{category}/{thread}', ['as' => 'category.thread.update', 'uses' => 'ForumController@updateThread']);
  Route::delete('/{category}/{thread}', ['as' => 'category.thread.delete', 'uses' => 'ForumController@deleteThread']);
  Route::post('/{category}/{thread}/{post}', ['as' => 'category.thread.post.vote', 'uses' => 'ForumController@vote']);
  Route::put('/{category}/{thread}/{post}', ['as' => 'category.thread.post.update', 'uses' => 'ForumController@updatePost']);
});

Route::group(['prefix' => 'docs', 'middleware' => ['web']], function()
{
  Route::get('/',  ['as' => 'docs', 'uses' => 'DocsController@index']);
});
