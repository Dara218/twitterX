<?php

use App\Http\Controllers\DateController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getMonths', [DateController::class, 'getMonths'])->name('getMonths');
Route::post('/register-user', [RegisterUserController::class, 'store'])->name('registerUser');
Route::put('/check-email-verification/{id}', [RegisterUserController::class, 'verifyEmailCode'])->name('verifyEmailCode');
Route::put('/store-user-password/{id}', [RegisterUserController::class, 'storePassword'])->name('storePassword');
Route::post('/store-user-photo/{id}', [RegisterUserController::class, 'storeUserPhoto'])->name('storeUserPhoto');
