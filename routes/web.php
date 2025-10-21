<?php

use App\Http\Controllers\BasicsController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

// Home Page
Route::get('/', HomeController::class)->name('home');

// Guest routes
Route::middleware('guest')->group(function (){
    // Login
    Route::view('/login', 'auth.login')->name('login-page');
    Route::post('/login', LoginController::class)->name('login');

    // Register
    Route::view('/register', 'auth.register')->name('register-page');
    Route::post('/register', RegisterController::class)
        ->middleware(ProtectAgainstSpam::class)
        ->name('register');
});

// Logout
Route::post('/logout', LogoutController::class)->middleware('auth')->name('logout');

// Profile
Route::prefix('users/profiles')->name('profiles.')->group(function (){
    Route::get('{user}', [ProfileController::class, 'showProfile'])->name('show');
    Route::get('{user}/saved', [ProfileController::class, 'savedRecipes'])->name('saved');
    Route::get('{user}/liked', [ProfileController::class, 'likedRecipes'])->name('liked');
    Route::get('{user}/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::put('{user}', [ProfileController::class, 'update'])->name('update');
    Route::delete('{user}', [ProfileController::class, 'destroy'])->name('destroy');
});

// Recipes
Route::prefix('recipes')->name('recipes.')->group(function (){
    Route::get('', [RecipeController::class, 'index'])->name('index');
    Route::get('{recipe}/guide', [RecipeController::class, 'guide'])->name('guide');
    Route::get('search', [RecipeController::class, 'search'])->name('search');

    Route::middleware(['auth', 'verified'])->group(function (){
        Route::view('create','recipes.recipe-create')->name('create');
        Route::get('{recipe}/edit', [RecipeController::class, 'edit'])->name('edit');
        Route::delete('{recipe}', [RecipeController::class, 'destroy'])->name('destroy');
    });
});

// Email Verification *auth
Route::prefix('email')->name('verification.')->middleware('auth')->group(function (){
    Route::view('verify', 'auth.verify-email')->name('notice');
    Route::get('verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware('signed')->name('verify');
    Route::post('verification-notification', [EmailVerificationController::class, 'resend'])->middleware('throttle:6,1')->name('send');
});

// Password Reset
Route::name('password.')->middleware('guest')->group(function (){
    Route::view('/forgot-password', 'auth.forgot-password')->name('request');
    Route::post('/forgot-password', [PasswordResetController::class, 'email'])->name('email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'reset'])->name('reset');
    Route::post('/reset-password', [PasswordResetController::class, 'update'])->name('update');
});

// FAQ Page
Route::view('/help/faq', 'help.faq')->name('faq');

// Basics routes
Route::prefix('basics')->group(function (){
    Route::view('', 'basics.index')->name('basics');
    Route::get('tools', [BasicsController::class, 'tools'])->name('tools');
    Route::get('techniques', [BasicsController::class, 'techniques'])->name('techniques');
});

// Legal routes
Route::get('/privacy', [LegalController::class, 'privacy'])->name('privacy');
Route::get('/terms', [LegalController::class, 'terms'])->name('terms');

// Fallback
Route::fallback(function (){
     abort(404);
});
