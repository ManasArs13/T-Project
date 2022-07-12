<?php

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

//Route::get('/', 'HomeController@index');
Route::get('/', 'OrderController@index')->middleware('auth')->name('home');
Route::put('/update/{id}', 'OrderController@update')->name('update');
Route::get('/create', 'OrderController@create')->name('create');;
Route::post('/store', 'OrderController@store')->name('store');