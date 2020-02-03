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

Route::prefix('categorias')->group(function(){
    Route::get('/', 'CategoryController@index')
        ->name('category');
    
    Route::post('/', 'CategoryController@store')
        ->name('category.store');

    Route::get('adicionar', 'CategoryController@create')
        ->name('category.new');

    Route::delete('delete/{categoria}', 'CategoryController@destroy')
        ->name('category.delete');

    Route::get('editar/{categoria}', 'CategoryController@edit')
        ->name('category.edit');

    Route::put('editar/{categoria}', 'CategoryController@update')
        ->name('category.update');
});

Route::prefix('produtos')->group(function(){
    Route::get('/', 'ProductController@index')
        ->name('product');
    
    Route::get('adicionar', 'ProductController@create')
        ->name('product.new');
    
    Route::post('/', 'ProductController@store')
        ->name('product.store');

    Route::get('editar/{produto}', 'ProductController@edit')
        ->name('product.edit');

    Route::get('deletar/{produto}', 'ProductController@destroy')
        ->name('product.delete');

    //Route::delete('deletar/{produto}', 'ProductController@destroy')
    //    ->name('product.delete');

    Route::put('editar/{produto}', 'ProductController@update')
        ->name('product.update');
});