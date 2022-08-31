<?php

// use App\Http\Controllers\Api\V1\AuthController;

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Api\V1')->group(function() {

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::middleware('auth:api')->group(function () {

        Route::apiResource('category', CategoryController::class);

        Route::prefix('post')->namespace('Post')->group(function() {
            Route::get('/', IndexController::class);
            Route::get('/{post}', ShowController::class);
            Route::post('/', StoreController::class);
            Route::put('/{post}', UpdateController::class);
            Route::delete('/{post}', DestroyController::class);
        });
    });
});
