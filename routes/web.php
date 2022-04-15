<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MuseumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionItemController;
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

Route::get('/', [DashboardController::class, 'landing']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/login', [UserController::class, 'view_login']);
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/logout', [UserController::class, 'logout']);
});

Route::middleware(['superuser'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('profile', [UserController::class, 'profile']);
    Route::get('user', [UserController::class, 'index']);
    Route::get('user/{id}', [UserController::class, 'detail']);
    Route::get('user/update_role/{id}/{role}', [UserController::class, 'update_role']);
    Route::get('verification', [TransactionController::class, 'verify']);
    Route::post('verify', [TransactionItemController::class, 'verify']);
    Route::get('verify/{code}', [TransactionItemController::class, 'show']);
    Route::get('transaction_verification/{id}', [TransactionController::class, 'update']);

    Route::resource('transaction', TransactionController::class);
    Route::resource('museum', MuseumController::class);
    Route::resource('gallery', GalleryController::class);
});
