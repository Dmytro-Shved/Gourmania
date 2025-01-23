<?php

use App\Http\Controllers\FilterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');

Route::get('/recipes', [FilterController::class, 'filter'])->name('filter');

Route::view('/recipes/name', 'recipe-guide');

Route::get('/login', [LoginController::class, 'index'])->name('login-page');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('/register', [RegisterController::class, 'index'])->name('register-page');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
