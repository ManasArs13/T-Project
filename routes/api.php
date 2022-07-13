<?php

use Illuminate\Http\Request;

Route::get('/create', 'OrderController@create')->name('create');
Route::post('/store', 'OrderController@store')->name('store');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
