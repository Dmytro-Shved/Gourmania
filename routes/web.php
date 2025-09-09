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

// Home Page
Route::get('/', HomeController::class)->name('home');

// Guest routes
Route::middleware('guest')->group(function (){
    Route::view('/login', 'auth.login')->name('login-page');
    Route::post('/login', LoginController::class)->name('login');

    Route::view('/register', 'auth.register')->name('register-page');
    Route::post('/register', RegisterController::class)->name('register');
});

// Profile
Route::get('/users/profiles/{user}', [ProfileController::class, 'showProfile'])->name('profiles.show');
Route::get('/users/profiles/{user}/saved', [ProfileController::class, 'savedRecipes'])->name('profiles.saved');
Route::get('/users/profiles/{user}/liked', [ProfileController::class, 'likedRecipes'])->name('profiles.liked');
Route::get('/users/profiles/{user}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
Route::put('/users/profiles/{user}', [ProfileController::class, 'update'])->name('profiles.update');
Route::delete('/users/profiles/{user}', [ProfileController::class, 'destroy'])->name('profiles.destroy');

// Show Recipes
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/{recipe}/guide', [RecipeController::class, 'guide'])->name('recipes.guide');
Route::get('/recipes/search', [RecipeController::class, 'search'])->name('recipes.search');

// Email Verification
Route::middleware('auth')->group(function (){
    Route::view('/email/verify', 'auth.verify-email')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
        ->middleware('signed')
        ->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});

// Password Reset
Route::middleware('guest')->group(function (){
    Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'email'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'reset'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'update'])->name('password.update');
});

// Auth routes
Route::middleware('auth')->group(function (){
    // Logout
    Route::post('/logout', LogoutController::class)->name('logout');

    // Verified Routes
    Route::middleware('verified')->group(function (){
        // Update Recipe
        Route::view('/recipes/create','recipes.recipe-create')->name('recipes.create');
        Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
        Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
    });
});

// FAQ Page
Route::view('/help/faq', 'help.faq')->name('faq');

// Basics routes
Route::view('/basics', 'basics.index')->name('basics');
Route::get('basics/tools', [BasicsController::class, 'tools'])->name('tools');
Route::get('basics/techniques', [BasicsController::class, 'techniques'])->name('techniques');

// Legal routes
Route::get('/privacy', [LegalController::class, 'privacy'])->name('privacy');
Route::get('/terms', [LegalController::class, 'terms'])->name('terms');

Route::fallback(function (){
     abort(404);
});
