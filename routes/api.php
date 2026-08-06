<?php


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



use App\Http\Controllers\Auth\SocialiteController;


// Authentication Routes

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/verify-otp', 'verifyOtp');
    Route::post('/login', 'login');

    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', 'logout');
    });


    Route::get('/google/redirect', [SocialiteController::class, 'redirect']);
    Route::get('/google/callback', [SocialiteController::class, 'callback']);

});

Route::post('/orders/{order}/checkout', [\App\Http\Controllers\PaymentController::class, 'pay']);


Route::prefix('auth')->controller(PasswordController::class)->group(function () {
    Route::post('/forget-password', 'forgetPassword');
    Route::post('/verify-password', 'verifyPassword');
    Route::post('/reset-password', 'resetPassword');
    Route::post('/resend-otp', 'resendOtp');

});

Route::prefix('home')->group(function () {
    Route::get('/trending-glasses', [\App\Http\Controllers\Api\Home\HomeController::class, 'trendingGlasses']);
    Route::get('/new-arrivals', [\App\Http\Controllers\Api\Home\HomeController::class, 'newArrivals']);
    Route::get('/recommendations', [\App\Http\Controllers\Api\Home\HomeController::class, 'recommendations']);
});

Route::middleware('auth:sanctum')->prefix('notifications')->group(function () {
    Route::get('/', [\App\Http\Controllers\NotificationController::class, 'index']);
    Route::get('/unread', [\App\Http\Controllers\NotificationController::class, 'unread']);
    Route::patch('/{id}/read', [\App\Http\Controllers\NotificationController::class, 'markAsRead']);
    Route::patch('/read-all', [\App\Http\Controllers\NotificationController::class, 'markAllAsRead']);
    Route::delete('/{id}', [\App\Http\Controllers\NotificationController::class, 'destroy']);
});

Route::apiResource('products', \App\Http\Controllers\ProductController::class);
