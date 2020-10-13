<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin']], function () {

    Route::get('/dashboard', 'Admin\BackendController@order');

    Route::get('/register-role', 'Admin\DashboardController@registered');

    Route::get('/role-edit/{id}', 'Admin\DashboardController@edited');

    Route::post('/role-update/{id}', 'Admin\DashboardController@updated');

    Route::get('/role-delete/{id}', 'Admin\DashboardController@deleted');

    Route::get('/aboutus', 'Admin\AboutusController@index');
    Route::post('/save-aboutus', 'Admin\AboutusController@store');
    Route::get('/edit-aboutus/{id}', 'Admin\AboutusController@edit');
    Route::post('/update-aboutus/{id}', 'Admin\AboutusController@update');
    Route::get('/delete-aboutus/{id}', 'Admin\AboutusController@delete');

    Route::get('/backend-category', 'Admin\BackendController@index');
    Route::post('/save-category', 'Admin\BackendController@store');
    Route::get('/edit-category/{id}', 'Admin\BackendController@edit');
    Route::post('/update-category/{id}', 'Admin\BackendController@update');
    Route::get('/delete-category/{id}', 'Admin\BackendController@delete');

    Route::get('/create-product', 'Admin\BackendController@create');
    Route::post('/store-product', 'Admin\BackendController@save');
    Route::get('/edit-product/{id}', 'Admin\BackendController@edited');
    Route::post('/update-product/{id}', 'Admin\BackendController@updated');
    Route::get('/delete-product/{id}', 'Admin\BackendController@destroy');

    
});

//Users

    Route::get('/home', 'Cart\cartController@index');
    Route::get('/addToCart/{id}', 'Cart\cartController@getAddToCart');
    Route::get('/showCart', 'Cart\cartController@showCart');
    Route::get('/getcheckOut', 'Cart\cartController@getcheckout');
    Route::post('/postcheckOut', 'Cart\cartController@postcheckout');

    Route::get('/myOrder', 'Cart\cartController@myorder');

    Route::get('/reduceByOne/{id}', 'Cart\cartController@getreduceByOne');
    Route::get('/increseByOne/{id}', 'Cart\cartController@getincreseByOne');
    