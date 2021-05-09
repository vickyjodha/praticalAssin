<?php

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('getcategory', [UserController::class, 'category']);
    Route::get('getproduct', [UserController::class, 'getproduct']);
    Route::get('product/{id}', [UserController::class, 'product']);
    Route::get('productsearch/{search}', [UserController::class, 'productsearch']);
});
