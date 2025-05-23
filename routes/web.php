<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');

Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/{recipe}/guide', [RecipeController::class, 'guide'])->name('recipes.guide');

Route::middleware('guest')->group(function (){
    Route::view('/login', 'auth.login')->name('login-page');
    Route::post('/login', LoginController::class)->name('login');

    Route::view('/register', 'auth.register')->name('register-page');
    Route::post('/register', RegisterController::class)->name('register');
});

Route::middleware('auth')->group(function (){
    Route::post('/logout', LogoutController::class)->name('logout');

    Route::view('/recipes/create','recipes.recipe-create')->name('recipes.create');
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'showEditForm'])->name('recipes.edit');
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

    Route::get('/users/profiles/{user}/saved', [ProfileController::class, 'savedRecipes'])->name('profiles.saved');
});

Route::get('/users/profiles/{user}', [ProfileController::class, 'show_profile'])->name('profiles.show');
Route::get('/users/profiles/{user}/edit', [ProfileController::class, 'edit_profile'])->name('profiles.edit')
    ->middleware('auth');
Route::put('/users/profiles/{user}', [ProfileController::class, 'update_profile'])->name('profiles.update');

Route::view('/info/faq', 'info.faq')->name('faq');
Route::view('/info/basics', 'info.basics')->name('basics');

Route::fallback(function (){
     abort(404);
});
