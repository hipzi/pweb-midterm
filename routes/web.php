<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BuyController;
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

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');

Route::get('/software/{type?}', [BuyController::class, 'softwareWithType'])->name('software-type');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('auth', [AuthController::class, 'auth'])->name('auth');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

//Route for authenticated user
Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.edit');

    Route::group(['middleware' => ['software-exist']], function () {
        Route::get('/software/detail/{id}', [BuyController::class, 'viewSoftwareDetail'])->name('software-detail');

        Route::group(['middleware' => ['software-already-bought']], function () {
            Route::get('/software/checkout/{id}', [BuyController::class, 'checkoutSoftware'])->name('software-checkout');
            Route::post('/checkout/{id}', [BuyController::class, 'checkout'])->name('checkout');
        });
    });
});

// Route for seller only
Route::middleware('auth-seller')->group(function () {
    Route::get('seller', [SellerController::class, 'index'])->name('seller.page');
});
