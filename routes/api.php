<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthorController;

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




Route::post('/register', [AuthorController::class, 'register']);
Route::post('/login', [AuthorController::class, 'login']);

//Private routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthorController::class, 'logout']);
});

Route::resource('bookings', BookingController::class)->except([
    'create', 'edit'
]);
Route::resource('kamars', KamarController::class)->except([
    'create', 'edit'
]);
Route::resource('transaksis', TransaksiController::class)->except([
    'create', 'edit', 'delete', 'update'
]);
