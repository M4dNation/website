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

Route::get('login',  ['as' => 'showLogin', 'uses' => 'HomeController@showLogin']);
Route::post('login', ['as' => 'doLogin', 'uses' => 'HomeController@doLogin']);

