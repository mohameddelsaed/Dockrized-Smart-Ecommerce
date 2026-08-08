<?php


use App\Http\Controllers\Api\Home\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\ProductController;
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

    Route::get('/google/redirect', [SocialiteController::class, 'redirect']);
    Route::get('/google/callback', [SocialiteController::class, 'callback']);
});


Route::prefix('auth')->controller(PasswordController::class)->group(function () {
    Route::post('/forget-password', 'forgetPassword');
    Route::post('/verify-password', 'verifyPassword');
    Route::post('/reset-password', 'resetPassword');
    Route::post('/resend-otp', 'resendOtp');
});


// products and categories routes
Route::get('/categories', [CategoryController::class, 'index']);

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{product}', [ProductController::class, 'show']);
});



Route::post('/orders/{order}/checkout', [PaymentController::class, 'pay']);


// Cart Routes

Route::middleware('auth:api')->prefix('cart')->controller(CartController::class)->group(function () {

    Route::get('/', 'show');

    Route::post('/add', 'add');

    Route::delete('/remove/{productId}', 'remove');
});
