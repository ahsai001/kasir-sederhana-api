<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\MenuController;
use App\Http\Controllers\API\OrderController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Menu;
use App\Models\Order;
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

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class,'login_api']);

Route::middleware(['auth:api'])->group(function(){
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout_api']);

    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('menus', MenuController::class);
    Route::apiResource('orders', OrderController::class);
});



