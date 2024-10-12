@extends('panel.layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="pagetitle">
    <h1>Add New Author</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add New Author</h5>

                    <!-- General Form Elements -->
                    <form action="" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Author Name</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Author Photo</label>
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
                               <img id="showImage"class="float-left upload-img-size" src="{{ asset('assets/upload/no_image.jpg') }}" alt="No Image">
                           </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input name="address" type="text" class="form-control" value="{{ old('address') }}" required>
                                @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Mobile Number</label>
                            <div class="col-sm-10">
                                <input name="mobile" type="text" class="form-control" value="{{ old('mobile') }}" required>
                                @error('mobile')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Email Adderss</label>
                            <div class="col-sm-10">
                                <input name="email" type="email" class="form-control" value="{{ old('email') }}">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Website</label>
                            <div class="col-sm-10">
                                <input name="website" type="text" class="form-control" value="{{ old('website') }}">
                                @error('website')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Create Author</button>
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
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection