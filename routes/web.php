<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('customer.home');
})->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('auth', [AuthController::class, 'auth'])->name('auth');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

//Route for authenticated user
Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.edit');
});

// Route for seller only
Route::middleware('auth-seller')->group(function () {
    Route::get('seller', [SellerController::class, 'index'])->name('seller.page');
});
