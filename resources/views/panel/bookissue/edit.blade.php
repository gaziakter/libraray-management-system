@extends('panel.layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="pagetitle">
    <h1>Edit Book</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Book</h5>

                    <!-- General Form Elements -->
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Book Name</label>
                            <div class="col-sm-9">
                                <input name="book_name" type="text" class="form-control" value="{{ old('book_name', $books->name) }}" required>
                                @error('book_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Book Photo</label>
                            <div class="col-sm-9">
                                <input id="image" name="photo" type="file" class="form-control">
                                @error('photo')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <img id="showImage" src="{{ $books->img ? asset('assets/upload/book/' . $books->img) : asset('assets/upload/no_logo.jpg') }}" class="upload-img-size">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Book Price</label>
                            <div class="col-sm-9">
                                <input name="price" type="number" class="form-control" value="{{ old('price', $books->price) }}" required>
                                @error('price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Categories & Subcategories</label>
                            <div class="col-sm-9">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Category</th>
                                            <th scope="col">Sub Category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="categories[]" 
                                                        value="{{ $category->id }}" 
                                                        id="category-{{ $category->id }}" 
                                                        {{ in_array($category->id, $selectedCategories) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="category-{{ $category->id }}">
                                                        {{ $category->category_name }}
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                @foreach ($category->subcategories as $subcategory)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="subcategories[]" 
                                                        value="{{ $subcategory->id }}" 
                                                        id="subcategory-{{ $subcategory->id }}" 
                                                        {{ in_array($subcategory->id, $selectedSubcategories) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="subcategory-{{ $subcategory->id }}">
                                                        {{ $subcategory->name }}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Author Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="author_name" required>
                                    <option value="">Select Author</option>
                                    @foreach ($authors as $author)
                                    <option value="{{ $author->id }}" {{ $books->author_id == $author->id ? 'selected' : '' }}>
                                        {{ $author->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('author_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Publisher Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="publisher_name" required>
                                    <option value="">Select Publisher</option>
                                    @foreach ($publishers as $publisher)
                                    <option value="{{ $publisher->id }}" {{ $books->publisher_id == $publisher->id ? 'selected' : '' }}>
                                        {{ $publisher->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('publisher_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary">Update Book</button>
                            </div>
                        </div>
                    </form><!-- End General Form Elements -->
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function(){
        // Image Preview
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection
