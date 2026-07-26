<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


use App\Http\Controllers\Auth\SocialiteController;

Route::prefix('auth')->group(function () {
    Route::get('/google/redirect', [SocialiteController::class, 'redirect']);
    Route::get('/google/callback', [SocialiteController::class, 'callback']);
});
