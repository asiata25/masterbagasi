<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::apiResource('products', ProductController::class);


    Route::middleware(['auth:sanctum'])->group(function () {
        Route::apiResource('orders', OrderController::class)->except('show');
        Route::apiResource('vouchers', VoucherController::class);
        Route::apiResource('carts', CartController::class)->except([
            'show',
            'update'
        ]);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
