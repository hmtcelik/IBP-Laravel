<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DashboardController;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{ 
    Route::get('/login', 'LoginController@show' )->name('login.show');
    Route::post('/login', 'LoginController@login')->name('login.perform');

    Route::group(['middleware' => ['auth']], function() {

        Route::get('/', 'DashboardController@base_router')->name('base');
        
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        
        Route::get('/products', 'ProductController@index')->name('products');
        Route::get('/products/new', 'ProductController@create')->name('new_product');
        Route::post('/products/store', 'ProductController@store')->name('save_product');

        Route::get('/messages', 'MessageController@index')->name('messages');
        Route::post('/messages/new', 'MessageController@store')->name('save_message');

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('/dashboard/products', 'DashboardController@products')->name('dashboard_products');
        Route::post('/dashboard/products/delete', 'DashboardController@product_delete')->name('dashboard_delete');
    });
});
