<?php

use App\Http\Controllers\Api\{
    AccountController,
    DonorController,
    TransactionController
};
use App\Http\Controllers\Api\Auth\{
    AuthController,
    RegisterController
};
use Illuminate\Support\Facades\Route;

/**
 * Auth and Register Routes
 */

Route::post('/register', [RegisterController::class, 'store']);

Route::post('/auth', [AuthController::class, 'auth']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('accounts', AccountController::class);

    Route::apiResource('transactions', TransactionController::class);

    Route::apiResource('donors', DonorController::class);
});

Route::get('/', function () {
    return response()->json(['message' => 'ok']);
});
