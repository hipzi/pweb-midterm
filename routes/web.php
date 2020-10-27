<?php

use App\Http\Controllers\AuthController;
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

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('auth', [AuthController::class, 'auth'])->name('auth');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

//Route for authenticated user
Route::middleware('auth')->group(function () {

});

// Route for seller only
Route::middleware('auth-seller')->group(function () {

});
