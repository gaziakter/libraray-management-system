<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorControlller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookIssueController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;

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

    // Author Route
    Route::get('panel/author', [AuthorControlller::class, 'list']);
    Route::get('panel/author/add', [AuthorControlller::class, 'add']);
    Route::post('panel/author/add', [AuthorControlller::class, 'insert']);
    Route::get('panel/author/details/{id}', [AuthorControlller::class, 'details']);
    Route::get('panel/author/edit/{id}', [AuthorControlller::class, 'edit']);
    Route::post('panel/author/edit/{id}', [AuthorControlller::class, 'update']);
    Route::get('panel/author/delete/{id}', [AuthorControlller::class, 'delete']);

    // Book Route
    Route::get('panel/book', [BookController::class, 'list']);
    Route::get('panel/book/add', [BookController::class, 'add']);
    Route::post('panel/book/add', [BookController::class, 'insert']);
    Route::get('panel/book/details/{id}', [BookController::class, 'details']);
    Route::get('panel/book/edit/{id}', [BookController::class, 'edit']);
    Route::post('panel/book/edit/{id}', [BookController::class, 'update']);
    Route::get('panel/book/delete/{id}', [BookController::class, 'delete']);
    
    // Route fetching subcategories for book
   // Route::get('/get-subcategories/{category_id}', [BookController::class, 'getSubcategories']);

    // Book Route
    Route::get('panel/student', [StudentController::class, 'list']);
    Route::get('panel/student/add', [StudentController::class, 'add']);
    Route::post('panel/student/add', [StudentController::class, 'insert']);
    Route::get('panel/student/details/{id}', [StudentController::class, 'details']);
    Route::get('panel/student/edit/{id}', [StudentController::class, 'edit']);
    Route::post('panel/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('panel/student/delete/{id}', [StudentController::class, 'delete']);

    // Bookissue Route
    Route::get('panel/bookissue', [BookIssueController::class, 'list']);
    Route::get('panel/bookissue/add', [BookIssueController::class, 'add']);
    Route::post('panel/bookissue/add', [BookIssueController::class, 'issue']);
    Route::get('panel/bookissue/return/{id}', [BookIssueController::class, 'return']);
    Route::post('panel/bookissue/return/{id}', [BookIssueController::class, 'returnBook']);
    Route::get('panel/bookissue/specific/{id}', [BookIssueController::class, 'specificBookIssue']);
    // Route to load the book return confirmation page
    Route::get('panel/bookissue/specificreturn/{bookId}', [BookIssueController::class, 'returnSpecificBook'])->name('bookissue.returnSpecificBook');

    // Route to handle the actual book return process
    Route::post('panel/bookissue/return/{bookIssueId}', [BookIssueController::class, 'spereturnBook'])->name('bookissue.returnBook');


    //Search Route
    Route::get('panel/search/form', [SearchController::class, 'search']);
    Route::post('panel/search/booksearch', [SearchController::class, 'bookSearch']);
    Route::post('panel/get-subcategories', [SearchController::class, 'getSubcategories'])->name('get.subcategories');

    //Role Route
    Route::get('panel/role', [RoleController::class, 'list'])->name('panel.role');
    Route::get('panel/role/add', [RoleController::class, 'add']);
    Route::post('panel/role/add', [RoleController::class, 'store']);
    Route::get('panel/role/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('panel/role/update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::get('panel/role/delete/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');


    //User Route
    Route::get('panel/user', [UserController::class, 'index'])->name('user.index');
    Route::get('panel/user/add', [UserController::class, 'create'])->name('users.create');
    Route::post('panel/user/store', [UserController::class, 'store'])->name('users.store');
    Route::get('panel/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('panel/user/edit/{id}', [UserController::class, 'update']);
    Route::get('panel/user/delete/{id}', [UserController::class, 'delete']);

});