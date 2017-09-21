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

    // Dashboard page
    Route::get('/', 'Home\HomeController@index')->name('home');

    // Products page
    Route::get('products', 'Products\ProductController@index')->name('products');

    // Landings related routes
    // TODO: make like products (separate non-webapi route for template and webapi for json-API)
    Route::resource('landings', 'Landings\LandingController');

    // WebAPI
    Route::group(['prefix' => 'webapi', 'namespace' => 'Webapi'], function () {
        // Route for Orders.vue component
        Route::resource('orders', 'Products\OrderController');

        // Routes for getting user's info via Web API
        Route::get('/users/{data}', 'UserController@getUsersDataByQuery');
        Route::get('/user/{user}/{data}', 'UserController@getUserData');

        // Route for Products.vue component
        Route::resource('products', 'Products\ProductController');
    });

});

// Authentication
Auth::routes();
