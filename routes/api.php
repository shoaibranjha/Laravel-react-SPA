<?php

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductsController;
// use Laravel\Passport\Http\Controllers\AccessTokenController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// User Registration Route
Route::post('register', [RegisterController::class, 'register']);

// User Login Route
Route::post('login', [LoginController::class, 'login']);
// Route::post('oauth/token', [AccessTokenController::class, 'issueToken']);

// Logout Route (optional if needed)
Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:api');

Route::middleware('auth:api')->group(function () {
    Route::name('products')->resource('products', ProductsController::class);
    // Define your protected routes here
});
