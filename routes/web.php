<?php
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/edit/{id}', 'AdminController@edit')->name('admin.edit');
Route::put('/admin/edit/{id}', 'AdminController@update')->name('admin.update');
Route::delete('/admin/{id}', 'AdminController@destroy')->name('admin.destroy');
Route::put('/admin/verif/{id}', 'AdminController@verif')->name('admin.verif');
Route::get('/home/print','HomeController@print')->name('print');
Route::get('/admin/print/{id}','AdminController@print')->name('admin.print');
Route::post('/home', 'HomeController@upload')->name('home.upload');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Auth::routes();
Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/print','HomeController@print')->name('print');
Route::post('/profile', 'HomeController@upload')->name('profile.upload');
Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/edit/{id}', 'AdminController@edit')->name('admin.edit');
Route::put('/admin/edit/{id}', 'AdminController@update')->name('admin.update');
Route::delete('/admin/{id}', 'AdminController@destroy')->name('admin.destroy');
Route::put('/admin/verif/{id}', 'AdminController@verif')->name('admin.verif');
Route::get('/admin/print/{id}','AdminController@print')->name('admin.print');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

