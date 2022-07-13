<?php


Auth::routes();


Route::get('/', 'OrderController@index')->middleware('auth')->name('home');

Route::get('/show/{filtr}', 'OrderController@show')->middleware('auth')->name('show');
Route::put('/update/{id}', 'OrderController@update')->middleware('auth')->name('update');



/* 
Для отправки заявок через web-интерфейс 
раскомментируйте следующие строки 
*/

//Route::get('/create', 'OrderController@create')->name('create');
//Route::post('/store', 'OrderController@store')->name('store');