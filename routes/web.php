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
    return view('index');
});

Route::group(['prefix' => 'beer', 'as' => 'beer.'], function () {
    Route::get('index', 'BeerController@index')->name('index');
    /*Route::get('login', 'Dashboard\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Dashboard\Auth\LoginController@login')->name('login');
    Route::middleware(['auth:admins'])->group(function (){
        Route::resource('major_categories', 'Dashboard\MajorCategoryController');
        Route::resource('categories', 'Dashboard\CategoryController');
        Route::resource('products', 'Dashboard\ProductController');
        Route::resource('users', 'Dashboard\UserController');
    });*/
});

