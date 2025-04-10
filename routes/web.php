<?php

use App\Http\Controllers\FilterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');

Route::get('/recipes', [FilterController::class, 'filter'])->name('filter');

Route::view('/recipes/guide/name', 'recipes.recipe-guide');

Route::middleware('guest')->group(function (){
    Route::get('/login', [LoginController::class, 'index'])->name('login-page');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/register', [RegisterController::class, 'index'])->name('register-page');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function (){
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::get('/recipes/create', [RecipeController::class, 'showCreateForm'] )->name('recipes.create');
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'showEditForm'])->name('recipes.edit');
});

Route::get('/logout', function () {
    return redirect()->route('login-page');
});

Route::get('/user/profiles/{user}', [ProfileController::class, 'show_profile'])->name('profiles.show');
Route::get('/user/profiles/{user}/edit', [ProfileController::class, 'edit_profile'])->name('profiles.edit')
    ->middleware('auth');
Route::put('/user/profiles/{user}', [ProfileController::class, 'update_profile'])->name('profiles.update');

Route::view('/faq', 'faq')->name('faq');
