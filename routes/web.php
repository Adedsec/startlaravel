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

//Route::get('/', function () {
//    return view('welcome');
//});

use Illuminate\Support\Facades\Route;

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@About');

Route::get('/products', 'ProductController@index');

Route::get('products/create', 'ProductController@create')->name('products.create');

Route::get('products/{id}', 'ProductController@show');

Route::post('products', 'ProductController@store')->name('product.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');
Route::put('products/{id}', 'ProductController@update')->name('products.update');

