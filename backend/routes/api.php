<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::get('/me', [AuthController::class, 'me'])->middleware('auth:api');
});

Route::group(['prefix' => 'v1/user'], function () {
    Route::post('/change-email', [UserController::class, 'changeEmail'])
        ->middleware('auth:api')
        ->name('user.change-email');
    Route::post('/change-password', [UserController::class, 'changePassword'])
        ->middleware('auth:api')
        ->name('user.change-password');
    Route::post('/change-user-info', [UserController::class, 'changeInfo'])
        ->middleware('auth:api')
        ->name('user.change-info');
    Route::post('/upload-user-image', [UserController::class, 'uploadImage'])
        ->middleware('auth:api')
        ->name('user.upload-image');
});
