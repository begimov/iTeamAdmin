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

    // Pages page
    Route::get('pages', 'Pages\PageController@index')->name('pages');
    // TODO: use separate route to preview page in admin panel or use users path with slug?
    Route::get('pages/{page}', 'Pages\PageController@show')->name('pages.show.preview');

    // WebAPI
    Route::group(['prefix' => 'webapi', 'namespace' => 'Webapi'], function () {
        // Route for Orders.vue component
        Route::resource('orders', 'Products\OrderController');

        // Routes to retrieve user's info
        Route::get('/users/{data}', 'UserController@getUsersDataByQuery');
        Route::get('/user/{user}/{data}', 'UserController@getUserData');

        // Route for Products.vue component
        Route::resource('products', 'Products\ProductController');

        // Route for Pages.vue component
        Route::resource('pages', 'Pages\PageController');

        // Route for FileUploader.vue component, to store material's files
        Route::post('/files/{material}/file', 'Content\FileController@store');
    });

});

// Authentication
Auth::routes();
