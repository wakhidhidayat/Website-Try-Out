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
