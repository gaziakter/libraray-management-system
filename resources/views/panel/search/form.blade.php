<!-- resources/views/panel/book/search-form.blade.php -->

@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Search</h1>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-7">
            <div class="card p-5">
                <div class="card-body">
                    <h5 class="card-title mb-4">Search Books</h5>

                    <form method="POST" action="{{ url('panel/search/booksearch') }}" class="row g-3 align-items-center">
                        @csrf
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
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sub-category select -->
                        <div class="row mb-3 mb-2">
                            <label for="subCategory" class="form-label">Select Sub-category</label>
                            <select class="form-select" id="subCategory" name="subCategory">
                                <option value="">All Sub-categories</option>
                                <!-- Subcategory options will be loaded dynamically -->
                            </select>
                        </div>

                        <!-- Author select -->
                        <div class="row mb-3 mb-2">
                            <label for="author" class="form-label">Select Author</label>
                            <select class="form-select" id="author" name="author">
                                <option value="">All Authors</option>
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Publisher select -->
                        <div class="row mb-3 mb-2">
                            <label for="publisher" class="form-label">Select Publisher</label>
                            <select class="form-select" id="publisher" name="publisher">
                                <option value="">All Publishers</option>
                                @foreach($publishers as $publisher)
                                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Search button -->
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
</section>

<!-- jQuery and AJAX script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#category').on('change', function() {
        var categoryId = $(this).val();

        if (categoryId) {
            $.ajax({
                url: '{{ route('get.subcategories') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    category_id: categoryId
                },
                success: function(data) {
                    $('#subCategory').empty(); // Clear existing options
                    $('#subCategory').append('<option value="">All Sub-categories</option>');
                    
                    $.each(data, function(index, subcategory) {
                        $('#subCategory').append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                    });
                }
            });
        } else {
            $('#subCategory').empty();
            $('#subCategory').append('<option value="">All Sub-categories</option>');
        }
    });
});
</script>

@endsection
