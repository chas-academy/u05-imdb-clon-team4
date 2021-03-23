<?php

use App\Http\Controllers\Admin\Auth\RegisterAdminController;
use App\Http\Controllers\Movie\MovieController;
use App\Http\Controllers\Movie\MovieList;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\User\RegisteredUserController;
use App\Http\Controllers\User\RegisterUserController;
use App\Http\Controllers\User\TermsController;
use Illuminate\Support\Facades\Route;

// Interface
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Admin
// register
Route::get('admin/register', [RegisterAdminController::class, 'showRegistrationForm'])->name('backpack.auth.register');
Route::post('admin/register', [RegisterAdminController::class, 'register']);

// User
// home
Route::get('account', [RegisteredUserController::class, 'index'])->name('user_home');

// login
Route::get('login', [LoginController::class, 'index'])->name('user_login');
Route::post('login', [LoginController::class, 'store']);

// logout
Route::get('logout', [LogoutController::class, 'store'])->name('user_logout');

// create
Route::get('register', [RegisterUserController::class, 'index'])->name('user_create');
Route::post('register', [RegisterUserController::class, 'create']);

// terms
Route::get('user-terms', [TermsController::class, 'index'])->name('user_terms');

// Movie
Route::get('movie', [MovieController::class, 'index'])->name('movie');
Route::get('movielist', [MovieList::class, 'index']);
