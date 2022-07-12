<?php

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

//Route::get('/', 'HomeController@index');
Route::get('/', 'OrderController@index')->middleware('auth')->name('home');
Route::get('/show/{filtr}', 'OrderController@show')->name('show');
Route::put('/update/{id}', 'OrderController@update')->middleware('auth')->name('update');
Route::get('/create', 'OrderController@create')->name('create');;
Route::post('/store', 'OrderController@store')->name('store');