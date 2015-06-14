<?php

// Authentication routes...
Route::get('auth/login', 'App\Http\Controllers\Auth\AuthController@getLogin');
Route::post('auth/login', 'App\Http\Controllers\Auth\AuthController@postLogin');
Route::get('auth/logout', 'App\Http\Controllers\Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'App\Http\Controllers\Auth\AuthController@getRegister');
Route::post('auth/register', 'App\Http\Controllers\Auth\AuthController@postRegister');

//-----------------------------------------------------------------------------
// Home
// Route::group(['middleware' => 'auth'], function() {
	Route::get('/',         'Isabry\Gatekeeper\Controllers\HomeController@index');
	Route::get('home',      'Isabry\Gatekeeper\Controllers\HomeController@index');
	Route::get('dashboard', 'Isabry\Gatekeeper\Controllers\HomeController@dashboard');
	Route::get('profile',   'Isabry\Gatekeeper\Controllers\HomeController@profile');
// });


//-----------------------------------------------------------------------------
// Users
// Route::group(['permissions' => ['admin', 'manager']], function () {
	Route::resource('users', 'Isabry\Gatekeeper\Controllers\UsersController');
	Route::post('users/{userid}/enable', [
		'uses' => 'Isabry\Gatekeeper\Controllers\UsersController@enable',
		'as' => 'users.enable',
	]);
// });

//-----------------------------------------------------------------------------
// Groups
// Route::group(['permissions' => ['admin', 'manager']], function () {
	Route::resource('groups', 'Isabry\Gatekeeper\Controllers\GroupsController');
	Route::post('groups/{userid}/enable', [
		'uses' => 'Isabry\Gatekeeper\Controllers\GroupsController@enable',
		'as' => 'groups.enable',
	]);
// });