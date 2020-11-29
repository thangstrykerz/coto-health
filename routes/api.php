<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('/profile/update', [App\Http\Controllers\Api\V1\UsersController::class, 'updateProfile'])->name('api.log-meal');
    Route::post('/meal/log', [App\Http\Controllers\Api\V1\MealController::class, 'logMeal'])->name('api.log-meal');
});

Route::group(['middleware' => 'guest:api'], function() {
    Route::post('/register', [App\Http\Controllers\Api\V1\Auth\RegisterController::class, 'register'])->name('api.register');
    Route::post('/login', [App\Http\Controllers\Api\V1\Auth\LoginController::class, 'login'])->name('api.login');
    Route::post('/password/forgot', [App\Http\Controllers\Api\V1\Auth\ForgotPasswordController::class, 'sendResetEmailLink'])->name('api.password-reset');
    Route::post('/password/reset', [App\Http\Controllers\Api\V1\Auth\ResetPasswordController::class, 'reset'])->name('password.reset');
});
