<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\BookingController;
use App\Http\Controllers\API\V1\TripController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function () {
    Route::post('/login', [AuthController::class, 'store']);
    Route::get('/trips', [TripController::class, 'index'])->middleware('auth:sanctum');
    Route::post('/bookings', [BookingController::class, 'store'])->middleware('auth:sanctum');
});
