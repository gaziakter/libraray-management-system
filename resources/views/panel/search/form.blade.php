@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Search</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-7">
    <div class="card p-5">
        <div class="card-body">
            <h5 class="card-title mb-4">Search Books</h5>

            <form method="POST" action="#" class="row g-3 align-items-center">
                <!-- Search input field (right side) -->
                <div class="row mb-3 mb-2">
                    <label for="searchQuery" class="form-label">Enter Book ID or Name</label>
                    <input 
                        type="text" 
                        id="searchQuery" 
                        name="query" 
                        class="form-control" 
                        placeholder="Type book number or name" 
                        required 
                    >
                </div>

                <!-- Category select -->
                <div class="row mb-3 mb-2">
                    <label for="category" class="form-label">Select Category</label>
                    <select class="form-select" id="category" name="category">
                        <option value="">All Categories</option>
                        <option value="fiction">Fiction</option>
                        <option value="non-fiction">Non-Fiction</option>
                        <option value="science">Science</option>
                        <option value="history">History</option>
                    </select>
                </div>

                <!-- Sub-category select -->
                <div class="row mb-3 mb-2">
                    <label for="subCategory" class="form-label">Select Sub-category</label>
                    <select class="form-select" id="subCategory" name="subCategory">
                        <option value="">All Sub-categories</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="biography">Biography</option>
                        <option value="technology">Technology</option>
                        <option value="politics">Politics</option>
                    </select>
                </div>

                <!-- Author select -->
                <div class="row mb-3 mb-2">
                    <label for="author" class="form-label">Select Author</label>
                    <select class="form-select" id="author" name="author">
                        <option value="">All Authors</option>
                        <option value="author1">J.K. Rowling</option>
                        <option value="author2">George R.R. Martin</option>
                        <option value="author3">Stephen King</option>
                    </select>
                </div>

                <!-- Publisher select -->
                <div class="row mb-3 mb-2">
                    <label for="publisher" class="form-label">Select Publisher</label>
                    <select class="form-select" id="publisher" name="publisher">
                        <option value="">All Publishers</option>
                        <option value="pub1">Penguin</option>
                        <option value="pub2">HarperCollins</option>
                        <option value="pub3">Simon & Schuster</option>
                    </select>
                </div>

                <!-- Search button with an icon -->
                <div class="row mb-3 mb-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search"></i> Search
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
</div>
</section>
<!-- Bootstrap Icons CDN -->
@endsection
