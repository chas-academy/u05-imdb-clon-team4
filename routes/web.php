<?php

use App\Http\Controllers\Admin\Auth\RegisterAdminController;
use App\Http\Controllers\ComponentSearchController;
use App\Http\Controllers\Movie\AddedMovieController;
use App\Http\Controllers\Movie\MovieController;
use App\Http\Controllers\Movie\MovieReviewWriteController;
use App\Http\Controllers\Page\HomePageController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\User\RegisteredUserController;
use App\Http\Controllers\User\RegisterUserController;
use App\Http\Controllers\User\TermsController;
use Illuminate\Support\Facades\Route;

// Search
// With uri as an optional URL param where it can be anything or nothing
Route::post('{uri?}search', [ComponentSearchController::class, 'search'])->name('component_search')->where('uri', '.*');

// App Pages
Route::get('/', [HomePageController::class, 'index'])->name('page_home');

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

// Movies
// movie
Route::get('movie/{id}', [MovieController::class, 'index'])->name('page_movie');

// movie added movie to DB
Route::post('movie/{movie}/add', [AddedMovieController::class, 'store'])->name('add_to_watchlist');

//movie removed from DB
Route::delete('account/{movie}', [AddedMovieController::class, 'destroy'])->name('remove_from_watchlist');

// user delete review
Route::delete('movie/{id}', [MovieReviewWriteController::class, 'destroy']);

// review
// form
Route::get('movie/{id}/review-write', [MovieReviewWriteController::class, 'index'])->name('page_movie_review_create');

// create
Route::post('movie/{movie}/review-write', [MovieReviewWriteController::class, 'create']);
