<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/', [AuthController::class, 'auth_login']);
Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout']);

