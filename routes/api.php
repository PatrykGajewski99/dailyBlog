<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer;

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
Route::prefix('/user')->group(function () {
    Route::post('/register', Customer\RegisterController::class);
    Route::post('/login', Customer\LoginController::class);
});

