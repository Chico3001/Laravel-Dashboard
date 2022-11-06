<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::view('/', 'front.index')->name('index');

Route::view('login', 'front.login')->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Add more public routes below...


/*
|--------------------------------------------------------------------------
| Private Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
	// Route::get('/', [DashboardController::class, 'index'])->name('index');
	Route::get('home', [DashboardController::class, 'index'])->name('home');

	Route::resource('users', UserController::class);

	// Add more private routes below...


});
