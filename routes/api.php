<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UtilityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['force.json'])->group(function () {
    Route::prefix('product')->group(function () {
        Route::post('/set_data', [ProductController::class, 'setData']);
        Route::get('/get_data/{id}', [ProductController::class, 'getData']);
    });

    Route::prefix('seller')->group(function () {
        Route::post('/set_data', [SellerController::class, 'setData']);
    });

    Route::post('/update_data_bulk', [ProductController::class, 'updateDataBulk']);
    Route::post('/bulk_insert', [ProductController::class, 'bulkInsert']);

    Route::prefix('utilities')->group(function () {
        Route::get('/parser', [UtilityController::class, 'parse']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
