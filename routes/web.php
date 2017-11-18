<?php

// Client
Route::get('/', ['uses' => 'IndexController@index','as' => 'home']);
Route::get('/repair', ['uses' => 'GalleryController@repair','as' => 'repair']);
Route::get('/making', ['uses' => 'GalleryController@making','as' => 'making']);
Route::get('/get-making-images/{id}', ['uses' => 'GalleryController@getMakingImages','as' => 'getMakingImages']);
Route::post('order', ['uses' => 'OrderController@sendOrder', 'as' => 'sendOrder']);

// Login
Route::get('login', ['uses' => 'Auth\LoginController@showLoginForm', 'as' => 'login']);
Route::post('login', ['uses' => 'Auth\LoginController@login', 'as' => 'login']);
Route::post('logout', ['uses' => 'Auth\LoginController@logout', 'middleware' => 'web' ,'as' => 'logout']);
Route::get('password/reset', [
	'uses' => '\Auth\ForgotPasswordController@showLinkRequestForm', 'as' => 'password.request'
]);
Route::post('password/reset','\Auth\ForgotPasswordController@reset');
Route::get('password/reset/{token}', [
	'uses' => '\Auth\ForgotPasswordController@showResetForm', 'as' => 'password.reset'
]);

// Admin
Route::group([
	'prefix' => 'admin',
	'namespace' => 'Admin',
	'middleware' => 'auth',
	'as' => 'admin.'
], function() {
	Route::get('/', ['uses' => 'AdminController@index','as' => 'admin']);
	Route::get('/edit', ['uses' => 'AdminController@edit','as' => 'edit_admin_home']);
	Route::post('/update', ['uses' => 'AdminController@update','as' => 'update_admin_home']);
	Route::get('orders', ['uses' => 'OrderController@index','as' => 'orders']);
	Route::get('search-orders', ['uses' => 'OrderController@searchOrders','as' => 'search_orders']);
	Route::get('delete-order/{id?}', ['uses' => 'OrderController@deleteOrder', 'as' => 'deleteOrder']);
	Route::post('add-note/{id?}', ['uses' => 'OrderController@addNote', 'as' => 'addNote']);
	Route::resource('services', 'ServiceController');
	Route::resource('repair', 'RepairController');
	Route::resource('making', 'MakingController');
	Route::post('making-delete-image',['uses' => 'MakingController@makingDeleteImage', 'as' => 'makingDeletImage']);
	Route::resource('materials', 'MaterialController');
	Route::resource('contacts', 'ContactController');
	Route::post('change-password', ['uses' => 'UserController@changePassword', 'as' => 'changePassword']);
	Route::post('change-profile', ['uses' => 'UserController@changeProfile', 'as' => 'changeProfile']);
	Route::get('profile', ['uses' => 'UserController@index', 'as' => 'getProfile']);
});

Route::auth();