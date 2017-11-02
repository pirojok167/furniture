<?php

// Client
Route::get('/', ['uses' => 'IndexController@index','as' => 'home']);
Route::get('/repair', ['uses' => 'GalleryController@repair','as' => 'repair']);
Route::get('/making', ['uses' => 'GalleryController@making','as' => 'making']);

// Login
Route::get('login', ['uses' => 'Auth\LoginController@showLoginForm', 'as' => 'login']);
Route::post('login', ['uses' => 'Auth\LoginController@login', 'as' => 'login']);
Route::post('logout', ['uses' => 'Auth\LoginController@logout', 'middleware' => 'web' ,'as' => 'logout']);

// Admin
Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
	'middleware' => 'auth',
	'as' => 'admin.'
], function() {
	Route::get('/', ['uses' => 'AdminController@index','as' => 'admin']);
	Route::get('orders', ['uses' => 'OrderController@index','as' => 'orders']);
	Route::resource('services', 'ServiceController');
	Route::resource('repair', 'RepairController');
	Route::resource('making', 'MakingController');
	Route::resource('materials', 'MaterialController');
	Route::resource('contacts', 'ContactController');
});