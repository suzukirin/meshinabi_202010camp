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

Route::get('/', 'RestaurantController@index');
Route::resource('restaurants', 'RestaurantController', ['only' => ['index']]);

Route::group(['middleware' => 'auth'],function(){
    Route::resource('restaurants', 'RestaurantController', ['only' => ['show']]);
});

//index,showのみ
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

