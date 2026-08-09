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

Route::post('/orders/{order}/pay', [\App\Http\Controllers\PaymentController::class, 'pay']);


Route::prefix('auth')->controller(PasswordController::class)->group(function () {
    Route::post('/forget-password', 'forgetPassword');
    Route::post('/verify-password', 'verifyPassword');
    Route::post('/reset-password', 'resetPassword');
    Route::post('/resend-otp', 'resendOtp');

});

Route::middleware('auth:api')->prefix('notifications')->group(function () {
    Route::get('/', [\App\Http\Controllers\Notification\NotificationController::class, 'index']);
    Route::get('/unread', [\App\Http\Controllers\Notification\NotificationController::class, 'unread']);
    Route::patch('/{id}/read', [\App\Http\Controllers\Notification\NotificationController::class, 'markAsRead']);
    Route::patch('/read-all', [\App\Http\Controllers\Notification\NotificationController::class, 'markAllAsRead']);
    Route::delete('/{id}', [\App\Http\Controllers\Notification\NotificationController::class, 'destroy']);
});


Route::middleware('auth:api')->prefix('orders')->group(function () {
    Route::get('/', [\App\Http\Controllers\Order\OrderController::class, 'index']);
    Route::post('/', [\App\Http\Controllers\Order\OrderController::class, 'store']);
    Route::get('/{order}', [\App\Http\Controllers\Order\OrderController::class, 'show']);
});

//Admins Endpoint

Route::apiResource('products', \App\Http\Controllers\Admin\ProductController::class);
Route::apiResource('categories', \App\Http\Controllers\CategoryController::class);

