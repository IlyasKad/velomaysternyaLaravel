<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@show');

Route::resource('admin/pages', PageController::class)->except([ 
    'show',
]);

Route::get('admin/pages/{code}/{order?}', 'PageController@show')->name('pages.show');
Route::get('page/{code}/{order?}', 'PageController@userShow')->name('userShow');
Route::get('page/{order?}', 'PageController@userIndex')->name('userIndex');











