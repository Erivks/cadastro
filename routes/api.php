<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categorias', 'CategoryController@categoriesJSON');
Route::get('/produtos', 'ProductController@productJSON');
Route::post('/produtos', 'ProductController@storeAJAX');
Route::post('/categorias', 'CategoryController@storeAJAX');
Route::delete('/categorias/{id}', 'CategoryController@destroyAJAX');
Route::delete('/produtos/{id}', 'ProductController@destroyAJAX');