<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@show');

Route::resource('admin/pages', 'PageController')->except(['show', 'create']);  

Route::get('admin/pages/create/{entity?}', 'PageController@create')->name('pages.create');
Route::get('admin/pages/{code}/{order?}', 'PageController@show')->name('pages.show');

Route::get('page/{code}/{order?}', 'PageController@userShow')->name('userShow');
Route::get('page/{order?}', 'PageController@userIndex')->name('userIndex');



Route::get('admin/entities/create/', 'EntityController@create')->name('entities.create');
Route::post('admin/entities/store/', 'EntityController@store')->name('entities.store');
Route::get('admin/entities/{id}', 'EntityController@show')->name('entities.show');

Route::post('admin/entities/{id}', 'EntityController@destroy')->name('entities.destroy');
Route::get('admin/entities/{id}/edit', 'EntityController@edit')->name('entities.edit');
Route::post('admin/entity_update/{id}', 'EntityController@update')->name('entities.update');



Route::post('admin/fields/store/', 'FieldController@store')->name('fields.store');
Route::post('admin/fields/{id}', 'FieldController@destroy')->name('fields.destroy');
Route::get('admin/fields/{id}/edit', 'FieldController@edit')->name('fields.edit');
Route::post('admin/field_update/{id}', 'FieldController@update')->name('fields.update');

