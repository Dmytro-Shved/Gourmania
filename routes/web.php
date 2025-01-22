<?php

use App\Http\Controllers\FilterController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');

Route::get('/recipes', [FilterController::class, 'filter'])->name('filter');

Route::view('/recipes/name', 'recipe-guide');

Route::view('/login', 'login');
Route::view('/register', 'register');
