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

    // Products page
    Route::get('materials', 'Products\ProductController@index')->name('materials');

    // Pages page
    Route::get('pages', 'Pages\PageController@index')->name('pages');

    // WebAPI
    Route::group(['prefix' => 'webapi', 'namespace' => 'Webapi'], function () {
        // Route for Orders.vue component
        Route::patch('orders/{id}/paymentstate', 'Products\OrderController@updatePaymentState');
        Route::resource('orders', 'Products\OrderController');

        // Routes to retrieve user's info
        Route::get('/users/{data}', 'UserController@getUsersDataByQuery');

        // Route for Products.vue component
        Route::get('/products/all', 'Products\ProductController@all');
        Route::get('/products/free', 'Products\ProductController@getFreeProducts');
        Route::resource('products', 'Products\ProductController');

        // Route for Materials.vue & NewMaterial.vue components
        Route::resource('materials', 'Products\MaterialController');

        // Route for Pages.vue component
        Route::patch('pages/{id}/status', 'Pages\PageController@updateStatus');
        Route::resource('pages', 'Pages\PageController');

        // Route for FileUploader.vue component
        Route::resource('files', 'Content\FileController');

    });

});

// Authentication
Auth::routes();
