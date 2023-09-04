<?php

use App\Http\Controllers\DateController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserPhotoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/authenticated-user', function () {
    return true;
});

Route::get('/getMonths', [DateController::class, 'getMonths'])->name('getMonths');

Route::name('register.')->group(function(){
    Route::post('/register-user', [RegisterUserController::class, 'store'])->name('registerUser');
    Route::put('/check-email-verification/{id}', [RegisterUserController::class, 'verifyEmailCode'])->name('verifyEmailCode');
    Route::put('/store-user-password/{id}', [RegisterUserController::class, 'storePassword'])->name('storePassword');
    Route::put('/update-user-photo/{id}', [UserPhotoController::class, 'updateUserPhoto'])->name('updateUserPhoto');
    Route::put('/store-username/{id}', [RegisterUserController::class, 'updateUsername'])->name('updateUsername');
});

Route::name('session.')->group(function(){
    Route::post('/login-user', [SessionController::class, 'store'])->name('store');
    Route::post('/logout-user', [SessionController::class, 'logout'])->name('logout');
});
