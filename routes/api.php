<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\BuildingController;
use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\RentController;
use App\Http\Controllers\Api\AvailableController;


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
Route::group(['middleware' => 'auth:sanctum'], function(){

    Route::apiResource('buildings' ,BuildingController::class);
    Route::get('buildings/{id}' ,[BuildingController::class , 'show']);
    Route::apiResource('apartments',ApartmentController::class);
    Route::get('apartments/{id}' ,[ApartmentController::class , 'show']);
    Route::apiResource('shops',     ShopController::class);
    Route::apiResource('rent',      RentController::class);
    Route::apiResource('available', AvailableController::class);


});

Route::post("login", [UserController::class,'login']);
Route::post("register",[UserController::class,'register']);
