<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@show');
Route::resource('admin/pages', PageController::class);





