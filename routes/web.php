<?php

use App\Http\Controllers\FilterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShowProfileController;
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
});

Route::get('/logout', function () {
    return redirect()->route('login-page');
});

Route::get('/user/profile/{id}', [ShowProfileController::class, 'show_profile'])->name('show-profile');
