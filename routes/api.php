<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MuseumController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\TransactionItemController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'user'], function () {
    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);
    Route::get('profile', [UserController::class, 'profile'])->middleware('user');
    Route::get('logout', [UserController::class, 'logout']);
});

Route::group(['prefix' => 'museum'], function () {
    Route::get('/', [MuseumController::class, 'index']);
    Route::get('/{id}', [MuseumController::class, 'show']);
});

Route::group(['middleware' => 'user'], function() {
    Route::apiResource('transaction', TransactionController::class)->only('store', 'index', 'show', 'update');
    Route::post('transaction_receipt/{id}', [TransactionController::class, 'add_receipt']);
    Route::get('transaction_item/{id}', [TransactionItemController::class, 'show']);

});
