@extends('panel.layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="pagetitle">
    <h1>Add New Student</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add New Student</h5>

                    <!-- General Form Elements -->
                    <form action="" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Student Name</label>
                            <div class="col-sm-10">
                                <input name="student_name" type="text" class="form-control" value="{{ old('student_name') }}" required>
                                @error('student_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Father Name</label>
                            <div class="col-sm-10">
                                <input name="father_name" type="text" class="form-control" value="{{ old('father_name') }}" required>
                                @error('father_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                                <input id="image" name="student_photo" type="file" class="form-control">
                                @error('student_photo')
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
                                <input name="address" type="text" class="form-control" value="{{ old('address') }}">
                                @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Mobile Number</label>
                            <div class="col-sm-10">
                                <input name="mobile" type="text" class="form-control" value="{{ old('mobile') }}">
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
                            <label for="inputText" class="col-sm-2 col-form-label">Date of Birth</label>
                            <div class="col-sm-10">
                                <input name="date_of_birth" type="date" class="form-control" value="{{ old('date_of_birth') }}">
                                @error('date_of_birth')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                            <div class="col-sm-10">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked="">
                                <label class="form-check-label" for="gridRadios1">
                                  First radio
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                <label class="form-check-label" for="gridRadios2">
                                  Second radio
                                </label>
                              </div>
                              <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios" value="option" disabled="">
                                <label class="form-check-label" for="gridRadios3">
                                  Third disabled radio
                                </label>
                              </div>
                            </div>
                          </fieldset>
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
                                <button type="submit" class="btn btn-primary">Create Student</button>
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