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
Route::get('/', 'WebController@index')->name('home');
Route::get('beer', 'BeerController@index')->name('index');
Route::get('brewery', 'BeerController@brewery')->name('brewery');
Route::get('style', 'BeerController@style')->name('style');
Route::get('brewery_beers/{id}', 'BeerController@show')->name('show');
Route::post('search', 'BeerController@search')->name('search');

Route::get('test', 'WebController@test')->name('test');

Route::post('/', 'WebController@forecast');
