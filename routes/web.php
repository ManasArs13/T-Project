<?php

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'OrderController@index')->name('home');
Route::post('/store', 'OrderController@store')->name('store');