<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('tasks', 'TaskController@index')->name('tasks.index');

Route::get('tasks/create', 'TaskController@create')->name('tasks.create');

Route::get('tasks/{task}', 'TaskController@show')->name('tasks.show');

Route::post('tasks/store', 'TaskController@store')->name('tasks.store');

Route::get('tasks/{task}/edit', 'TaskController@edit')->name('tasks.edit');

Route::put('tasks/{id}/update', 'TaskController@update')->name('tasks.update');
//TODO как использовать через delete
Route::get('tasks/{task}/destroy', 'TaskController@destroy')->name('tasks.destroy');

////TODO алтернатива
//Route::resource('tasks', 'TaskController');
