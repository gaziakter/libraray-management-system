<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/', [AuthController::class, 'auth_login']);
Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'basicuser'], function(){
    Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);
    
    // Publication Route
    Route::get('panel/publisher', [PublisherController::class, 'list']);
    Route::get('panel/publisher/add', [PublisherController::class, 'add']);
    Route::post('panel/publisher/add', [PublisherController::class, 'insert']);
    Route::get('panel/publisher/details/{id}', [PublisherController::class, 'details']);
    Route::get('panel/publisher/edit/{id}', [PublisherController::class, 'edit']);
    Route::post('panel/publisher/edit/{id}', [PublisherController::class, 'update']);
    Route::get('panel/publisher/delete/{id}', [PublisherController::class, 'delete']);

    // Publication Route
    Route::get('panel/category', [CategoryController::class, 'list']);
    Route::get('panel/category/add', [CategoryController::class, 'add']);
    // Route::post('panel/category/add', [CategoryController::class, 'insert']);
    // Route::get('panel/category/details/{id}', [CategoryController::class, 'details']);
    // Route::get('panel/category/edit/{id}', [CategoryController::class, 'edit']);
    // Route::post('panel/category/edit/{id}', [CategoryController::class, 'update']);
    // Route::get('panel/category/delete/{id}', [CategoryController::class, 'delete']);


});