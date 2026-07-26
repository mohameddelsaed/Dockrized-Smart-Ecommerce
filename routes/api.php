<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Authentication Routes

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/verify-otp', 'verifyOtp');
    Route::post('/login', 'login');

    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', 'logout');
    });
});


Route::prefix('auth')->controller(PasswordController::class)->group(function () {
    Route::post('/forget-password', 'forgetPassword');
    Route::post('/verify-password', 'verifyPassword');
    Route::post('/reset-password', 'resetPassword');
    Route::post('/resend-otp', 'resendOtp');
});
