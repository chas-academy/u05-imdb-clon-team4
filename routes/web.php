<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;
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
/*
Route::get('/', function () {
return view('welcome');
});*/

Route::get('/', function () {
    return view('index');
});

Route::get('/signin', [SignInController::class, 'index']);

Route::get('/signup', [SignUpController::class, 'index']);

Route::get('/adminview', [AdminController::class, 'index']);

Route::get('/registereduser', [RegisteredUserController::class, 'index']);
