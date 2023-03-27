<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

        Route::get('/', function () {
            return view('welcome');
        });
        
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        Route::resource('products', ProductController::class);

    });
    
});
