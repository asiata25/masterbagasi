<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    Route::apiResource('products', ProductController::class);
    Route::apiResource('carts', CartController::class)->except([
        'show',
        'update'
    ])->middleware('auth:sanctum');

    Route::apiResource('vouchers', VoucherController::class)->except(['index', 'show'])->middleware(['auth:sanctum', 'adminOnly']);
    Route::middleware(['auth:sanctum', 'adminOnly'])->group(function () {
        Route::apiResource('vouchers', VoucherController::class)->except(['index', 'show']);
     
        Route::get('/vouchers', [VoucherController::class, 'index'])->withoutMiddleware(['adminOnly']);
        Route::get('/vouchers/{voucher}', [VoucherController::class, 'show'])->withoutMiddleware(['adminOnly']);
    });
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
