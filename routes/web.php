<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/products', 'ProductController@index')->name('products');
Route::post('/products', 'ProductController@store');
Route::get('/products/create', 'ProductController@create');
Route::get('/products/{product}', 'ProductController@show');
Route::delete('/products/{product}', 'ProductController@destroy');

Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/create', 'CategoryController@create');
Route::post('/categories', 'CategoryController@store');
Route::get('/categories/{category}', 'CategoryController@show');
Route::get('/categories/{category}/edit', 'CategoryController@edit');
Route::put('/categories/{category}', 'CategoryController@update');
Route::delete('/categories/{category}', 'CategoryController@destroy');
Route::get('/categories/{category}/products', 'CategoryController@showProducts');
