<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('login', 'login')->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Add more public routes below...



Route::middleware(['auth'])->group(function () {
	Route::get('/', [DashboardController::class, 'index'])->name('index');
	Route::get('home', [DashboardController::class, 'index'])->name('home');

	Route::resource('users', UserController::class);

	// Add more private routes below...


});
