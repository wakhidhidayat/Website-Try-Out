<?php
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'DaftarController@index')->name('daftar');
//Route::resource('/admin', 'AdminController')->name('admin');
