<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index');
Route::get('/allPages/{lang?}', 'PageController@getAllPages')->name('allPages');
Route::get('/{code}/{lang?}', 'PageController@getPage')->name('page');






