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

// Main admin panel group
Route::group(['middleware' => ['auth', 'role:admin']], function () {

    // Dashboard
    Route::get('/', 'Home\HomeController@index')->name('home');

    // Landings related routes
    Route::resource('landings', 'Landings\LandingController');

    //WebAPI
    Route::group(['prefix' => 'webapi', 'namespace' => 'Webapi'], function () {
        Route::resource('orders', 'Products\OrderController');
    });

});

// Authentication
Auth::routes();
