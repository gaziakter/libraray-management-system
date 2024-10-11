<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WriterControlller;

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
    Route::get('panel/subcategory/add', [SubCategoryController::class, 'add']);
    Route::post('panel/subcategory/add', [SubCategoryController::class, 'insert']);
    Route::get('panel/subcategory/edit/{id}', [SubCategoryController::class, 'edit']);
    Route::post('panel/subcategory/edit/{id}', [SubCategoryController::class, 'update']);
    Route::get('panel/subcategory/delete/{id}', [SubCategoryController::class, 'delete']);

    // Writer Route
    Route::get('panel/writer', [WriterControlller::class, 'list']);
    Route::get('panel/writer/add', [WriterControlller::class, 'add']);
    Route::post('panel/writer/add', [WriterControlller::class, 'insert']);
    Route::get('panel/writer/details/{id}', [WriterControlller::class, 'details']);
    Route::get('panel/writer/edit/{id}', [WriterControlller::class, 'edit']);
    Route::post('panel/writer/edit/{id}', [WriterControlller::class, 'update']);
    Route::get('panel/writer/delete/{id}', [WriterControlller::class, 'delete']);

        // Book Route
        Route::get('panel/book', [BookController::class, 'list']);
        Route::get('panel/book/add', [BookController::class, 'add']);
        // Route::post('panel/book/add', [BookController::class, 'insert']);
        // Route::get('panel/book/edit/{id}', [BookController::class, 'edit']);
        // Route::post('panel/book/edit/{id}', [BookController::class, 'update']);
        // Route::get('panel/book/delete/{id}', [BookController::class, 'delete']);

});