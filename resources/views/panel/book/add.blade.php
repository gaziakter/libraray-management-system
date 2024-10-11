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
                            <label for="inputText" class="col-sm-2 col-form-label">Book Name</label>
                            <div class="col-sm-10">
                                <input name="book_name" type="text" class="form-control" value="{{ old('book_name') }}" required>
                                @error('book_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Book Photo</label>
                            <div class="col-sm-10">
                                <input id="image" name="photo" type="file" class="form-control">
                                @error('photo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                           <div class="col-sm-10">
                               <img id="showImage"class="rounded img-thumbnail float-left upload-img-size" src="{{ asset('assets/upload/no_image.jpg') }}" alt="No Image">
                           </div>
                           <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Book Price</label>
                            <div class="col-sm-10">
                                <input name="price" type="number" class="form-control" value="{{ old('price') }}" required>
                                @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_name" id="category_name" required>
                                    <option value="">Select Category</option>
                                    @foreach ($getCagegory as $value)
                                        <option {{ old('category_id') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">
                                            {{ $value->category_name }}
                                        </option>   
                                    @endforeach
                                </select>
                                @error('category_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Sub Category Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="sub_category_name" id="sub_category_name">
                                    <option value="">Select Sub Category</option>
                                    @foreach ($getSubCategory as $value)
                                        <option value="{{ $value->id }}">{{ $value->sub_category_name }}</option>   
                                    @endforeach
                                </select>
                                
                                @error('sub_category_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Writer Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="writer_name" required>
                                    <option value="">Selete Writer</option>
                                    @foreach ($getWriter as $value )
                                    <option {{old('writer_id') == $value->id ? 'selected' : '' }} value="{{$value->id}}">{{$value->name}}</option>   
                                    @endforeach
                               </select>
                                @error('writer_name')
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
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
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