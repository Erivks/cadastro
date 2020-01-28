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
    return view('index');
})->name('home');

Route::get('/produtos', 'ProductController@index')->name('product');
Route::get('/categorias', 'CategoryController@index')->name('category');
Route::post('/categorias', 'CategoryController@store')->name('category.store');
Route::get('/categorias/adicionar', 'CategoryController@create')->name('category.new');
Route::delete('/categoria/delete/{categoria}', 'CategoryController@destroy')->name('category.delete');
Route::get('/categorias/editar/{categoria}', 'CategoryController@edit')->name('category.edit');
Route::put('/categorias/editar/{categoria}', 'CategoryController@update')->name('category.update');