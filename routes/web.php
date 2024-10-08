<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
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

    // Categories Route
    Route::get('panel/categories', [CategoryController::class, 'list']);
    Route::get('panel/category/add', [CategoryController::class, 'add']);
    Route::post('panel/category/add', [CategoryController::class, 'insert']);
    Route::get('panel/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('panel/category/edit/{id}', [CategoryController::class, 'update']);
    Route::get('panel/category/delete/{id}', [CategoryController::class, 'delete']);

    // Sub Categories Route
    Route::get('panel/subcategories', [SubCategoryController::class, 'list']);
    // Route::get('panel/subcategory/add', [SubCategoryController::class, 'add']);
    // Route::post('panel/subcategory/add', [SubCategoryController::class, 'insert']);
    // Route::get('panel/subcategory/edit/{id}', [SubCategoryController::class, 'edit']);
    // Route::post('panel/subcategory/edit/{id}', [SubCategoryController::class, 'update']);
    // Route::get('panel/subcategory/delete/{id}', [SubCategoryController::class, 'delete']);

});