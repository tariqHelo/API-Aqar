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

Auth::routes();



Auth::routes();

// Route::get('/', 'HomeController@welcome')->name('home');
Route::get('/', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'admins'], function() {
        Route::get('/','AdminController@index')->name('user.index');
        Route::get('/create','AdminController@create')->name('user.create');
        Route::post('/store','AdminController@store')->name('user.store');
        Route::get('/edit/{id}','AdminController@edit')->name('user.edit');
        Route::post('/update','AdminController@update')->name('user.update');    
        Route::get('/delete/{id}','AdminController@destroy')->name('user.delete');
    });

    Route::group(['prefix' => 'users'], function() {
        Route::get('/','UserController@index')->name('n-user.index');
        Route::get('/create','UserController@create')->name('n-user.create');
        Route::post('/store','UserController@store')->name('n-user.store');
        Route::get('/edit/{id}','UserController@edit')->name('n-user.edit');
        Route::post('/update','UserController@update')->name('n-user.update');    
        Route::get('/delete/{id}','UserController@destroy')->name('n-user.delete');
    });

    Route::group(['prefix' => 'eaqari'], function() {
        Route::get('/','EaqariController@index')->name('eaqari.index');
        Route::get('/create','EaqariController@create')->name('eaqari.create');
        Route::post('/store','EaqariController@store')->name('eaqari.store');
        Route::get('/edit/{id}','EaqariController@edit')->name('eaqari.edit');
        Route::get('/report','EaqariController@report')->name('eaqari.report');
        Route::post('/update','EaqariController@update')->name('eaqari.update');    
        Route::get('/delete/{id}','EaqariController@destroy')->name('eaqari.delete');
    });

    Route::group(['prefix' => 'orders'], function() {
        Route::get('/','OrderController@index')->name('order.index');
        Route::get('/commited','OrderController@commited')->name('order.commited');
        Route::get('/create','OrderController@create')->name('order.create');
        Route::post('/store','OrderController@store')->name('order.store');
        Route::get('/edit/{id}','OrderController@edit')->name('order.edit');
        Route::post('/update','OrderController@update')->name('order.update');    
        Route::get('/delete/{id}','OrderController@destroy')->name('order.delete');
    });

    Route::group(['prefix' => 'sales_bill'], function() {
        Route::get('/','SalesBillController@index')->name('sales_bill.index');
        Route::get('/create','SalesBillController@create')->name('sales_bill.create');
        Route::get('/report','SalesBillController@report')->name('sales_bill.report');
        Route::post('/store','SalesBillController@store')->name('sales_bill.store');
        Route::get('/edit/{id}','SalesBillController@edit')->name('sales_bill.edit');
        Route::post('/update','SalesBillController@update')->name('sales_bill.update');    
        Route::get('/delete/{id}','SalesBillController@destroy')->name('sales_bill.delete');
    });

    Route::group(['prefix' => 'sales_detail'], function() {
        Route::get('/create','SaleDetailController@create')->name('sales_detail.create');
        Route::post('/store','SaleDetailController@store')->name('sales_detail.store');
        Route::get('/edit/{id}','SaleDetailController@edit')->name('sales_detail.edit');
        Route::post('/update','SaleDetailController@update')->name('sales_detail.update');    
        Route::get('/delete/{id}','SaleDetailController@destroy')->name('sales_detail.delete');
    });

    Route::group(['prefix' => 'purchase'], function() {
        Route::get('/','PurchaseController@index')->name('purchase.index');
        Route::get('/create','PurchaseController@create')->name('purchase.create');
        Route::get('/report','PurchaseController@report')->name('purchase.report');
        Route::post('/store','PurchaseController@store')->name('purchase.store');
        Route::get('/edit/{id}','PurchaseController@edit')->name('purchase.edit');
        Route::post('/update','PurchaseController@update')->name('purchase.update');    
        Route::get('/delete/{id}','PurchaseController@destroy')->name('purchase.delete');
        Route::get('/pay-bank/{id}','PurchaseController@pay')->name('purchase.pay');
        Route::post('/pay-bank','PurchaseController@bank')->name('purchase.bank');
    });

    Route::group(['prefix' => 'purchase_detail'], function() {
        Route::get('/create','PurchaseDetailController@create')->name('purchase_detail.create');
        Route::post('/store','PurchaseDetailController@store')->name('purchase_detail.store');
        Route::get('/edit/{id}','PurchaseDetailController@edit')->name('purchase_detail.edit');
        Route::post('/update','PurchaseDetailController@update')->name('purchase_detail.update');    
        Route::get('/delete/{id}','PurchaseDetailController@destroy')->name('purchase_detail.delete');
    });

    // Route::group(['prefix' => 'report'], function() {
    //     Route::get('/create','ReportControlle@create')->name('repoet.create');
    //     Route::post('/store','PurchaseDetailController@store')->name('purchase_detail.store');
    //     Route::get('/edit/{id}','PurchaseDetailController@edit')->name('purchase_detail.edit');
    //     Route::post('/update','PurchaseDetailController@update')->name('purchase_detail.update');    
    //     Route::get('/delete/{id}','PurchaseDetailController@destroy')->name('purchase_detail.delete');
    // });

});






