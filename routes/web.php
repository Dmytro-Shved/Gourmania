<?php

use App\Http\Controllers\FilterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShowProfileController;
use App\Http\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');

Route::get('/recipes', [FilterController::class, 'filter'])->name('filter');

Route::view('/recipes/name', 'recipes.recipe-guide');

Route::middleware('guest')->group(function (){

    Route::get('/login', [LoginController::class, 'index'])->name('login-page');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/register', [RegisterController::class, 'index'])->name('register-page');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function (){

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    // The Email Verification Notice
    Route::get('/email/verify', [VerifyEmailController::class, 'verifyNotice'])->name('verification.notice');

    // The Email Verification Handler
    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verifyEmail'])->middleware(['signed'])->name('verification.verify');

    // Resending the Verification Email
    Route::post('/email/verification-notification', [VerifyEmailController::class, 'verifyHandler'])->middleware(['throttle:6,1'])->name('verification.send');
});

Route::get('/logout', function () {
    return redirect()->route('login-page');
});

Route::get('/user/profile/{id}', [ShowProfileController::class, 'show_profile'])->name('show-profile');

Route::view('/edit', 'user.edit-user-profile')->middleware('verified')->name('edit-profile');
