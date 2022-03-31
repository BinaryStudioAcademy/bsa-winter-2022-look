<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Matches\MatchesController;
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
    Route::post('/register-additional-info', [AuthController::class, 'registerAdditionalInfo'])->name('register.additional-info');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::get('/me', [AuthController::class, 'me'])->middleware('auth:api');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'passwordReset'])->name('password.change-request');
    Route::post('/reset-password', [ForgotPasswordController::class, 'passwordChange'])->name('password.reset');
    Route::post('/email-confirm', [AuthController::class, 'emailConfirmation'])->name('email-confirmation');
    Route::post('/send-validation-email', [AuthController::class, 'sendValidationEmail'])->name('send-validation-email');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function () {
    Route::get('/user-additional-info', [UserController::class, 'getUserAdditionalInfo'])
        ->name('user.get-additional-info');
    Route::post('/change-email', [UserController::class, 'changeEmail'])
        ->name('user.change-email');
    Route::post('/change-password', [UserController::class, 'changePassword'])
        ->name('user.change-password');
    Route::post('/change-user-info', [UserController::class, 'changeInfo'])
        ->name('user.change-info');
    Route::post('/upload-user-file', [UserController::class, 'uploadFile'])
        ->name('user.upload-file');
    Route::post('/delete-user-file', [UserController::class, 'deleteFile'])
        ->name('user.delete-file');
});

Route::group(['prefix' => 'match', 'middleware' => 'auth:api'], function () {
   Route::post('/set-like-status', [MatchesController::class, 'setLikeStatus'])
       ->name('matches.set-like-status');
   Route::post('/all-matches', [MatchesController::class, 'getAllMatches'])
       ->name('matches.get-all-matches');
    Route::post('/all-users-list', [MatchesController::class, 'getUsersList'])
        ->name('matches.get-users-list');
    Route::post('/all-liked', [MatchesController::class, 'getAllLiked'])
        ->name('matches.get-all-liked');

});
