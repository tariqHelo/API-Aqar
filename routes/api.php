<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'API'], function () {
    
    Route::post('/login','UserController@login');
    Route::post('/register_user','UserController@register');
    Route::post('/register_eaqaris','EaqariController@register');
    
    // orders managment .
    Route::post('/make_an_order','OrderController@store');
    Route::post('/get_user_order','OrderController@index');
    
    // interest order .
    Route::post('/add_to_interest_order','OrderController@interest');
    Route::post('/get_interest_order','OrderController@get_interest_order');
    
    // near by order .
    Route::post('/get_near_by_order','OrderController@get_near_order');
    
    // chat route .
    Route::post('/coversisions','ChatController@coversisions');
    Route::post('/chat','ChatController@chat');
    Route::post('/send_message','ChatController@store');
    
});
