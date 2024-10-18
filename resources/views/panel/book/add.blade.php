@extends('panel.layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="pagetitle">
    <h1>Add New Book</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add New Book</h5>

                    <!-- General Form Elements -->
                    <form action="" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Book Name</label>
                            <div class="col-sm-9">
                                <input name="book_name" type="text" class="form-control" value="{{ old('book_name') }}" required>
                                @error('book_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Book Photo</label>
                            <div class="col-sm-9">
                                <input id="image" name="photo" type="file" class="form-control">
                                @error('photo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">  </label>
                           <div class="col-sm-9">
                               <img id="showImage"class="float-left upload-img-size" src="{{ asset('assets/upload/no_image.jpg') }}" alt="No Image">
                           </div>
                           <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Book Price</label>
                            <div class="col-sm-9">
                                <input name="price" type="number" class="form-control" value="{{ old('price') }}" required>
                                @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <h3>Select Categories</h3>
        @foreach ($categories as $category)
            <div class="mb-2">
                <strong>{{ $category->category_name }}</strong>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" id="category-{{ $category->id }}">
                    <label class="form-check-label" for="category-{{ $category->id }}">
                        {{ $category->name }}
                    </label>
                </div>

                <div class="ms-4">
                    <h4>Select Subcategories</h4>
                    @foreach ($category->subcategories as $subcategory)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="subcategories[]" value="{{ $subcategory->id }}" id="subcategory-{{ $subcategory->id }}">
                            <label class="form-check-label" for="subcategory-{{ $subcategory->id }}">
                                {{ $subcategory->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
                    </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Author Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="author_name" required>
                                    <option value="">Selete Author</option>
                                    @foreach ($getAuthor as $value )
                                    <option {{old('author_id') == $value->id ? 'selected' : '' }} value="{{$value->id}}">{{$value->name}}</option>   
                                    @endforeach
                               </select>
                                @error('author_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Publisher Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="publisher_name" required>
                                    <option value="">Selete Publisher</option>
                                    @foreach ($getPublisher as $value )
                                    <option {{old('category_id') == $value->id ? 'selected' : '' }} value="{{$value->id}}">{{$value->name}}</option>   
                                    @endforeach
                               </select>
                                @error('publisher_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Create Book</button>
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

        // Fetch Subcategories on Category Change
        $('#category_name').on('change', function() {
            var categoryId = $(this).val();
            
            if (categoryId) {
                $.ajax({
                    url: '/get-subcategories/' + categoryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#sub_category_name').empty();
                        $('#sub_category_name').append('<option value="">Select Sub Category</option>');
                        
                        $.each(data, function(key, value) {
                            $('#sub_category_name').append('<option value="'+ value.id +'">'+ value.sub_category_name +'</option>');
                        });
                    }
                });
            } else {
                $('#sub_category_name').empty();
                $('#sub_category_name').append('<option value="">Select Sub Category</option>');
            }
        });
    });
</script>

@endsection