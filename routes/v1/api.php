<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Api\V1')->group(function() {

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::middleware('auth:api')->group(function () {
        Route::apiResource('category', CategoryController::class);
        Route::apiResource('post', PostController::class);
    });
});
