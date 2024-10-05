<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/', [AuthController::class, 'auth_login']);
Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'basicuser'], function(){
    Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);
    
    // Publication Route
    Route::get('panel/publisher/list', [PublisherController::class, 'list']);


});