@extends('panel.layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="pagetitle">
    <h1>Edit Student</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Student</h5>

                    <!-- General Form Elements -->
                    <form action="" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Student Name</label>
                            <div class="col-sm-10">
                                <input name="student_name" type="text" class="form-control" value="{{$GetData->student_name}}" required>
                                @error('student_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Father Name</label>
                            <div class="col-sm-10">
                                <input name="father_name" type="text" class="form-control" value="{{$GetData->father_name}}" required>
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
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <img id="showImage" src="{{ $GetData->photo ? asset('assets/upload/student/' . $GetData->photo) : asset('assets/upload/no_logo.jpg') }}" class="upload-img-size">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input name="address" type="text" class="form-control" value="{{$GetData->address}}">
                                @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Mobile Number</label>
                            <div class="col-sm-10">
                                <input name="mobile" type="text" class="form-control" value="{{$GetData->phone}}">
                                @error('mobile')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Email Adderss</label>
                            <div class="col-sm-10">
                                <input name="email" type="email" class="form-control" value="{{$GetData->email}}">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Date of Birth</label>
                            <div class="col-sm-10">
                                <input name="date_of_birth" type="date" class="form-control" value="{{ $GetData->date_of_birth ? $GetData->date_of_birth->format('Y-m-d') : '' }}">
                                @error('date_of_birth')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gridRadios1" 
                                           value="male" {{ $GetData->gender == 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gridRadios1">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" 
                                           value="female" {{ $GetData->gender == 'female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gridRadios2">Female</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gridRadios3" 
                                           value="other" {{ $GetData->gender == 'other' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gridRadios3">Other</label>
                                </div>
                            </div>
                        </fieldset>
                        
                          <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Blood Group</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="blood_group" required>
                                    <option value="">Selete Blood Group</option>
                                    @foreach ($getBlood as $value )
                                    <option {{$GetData->blood_id == $value->id ? 'selected' : '' }} value="{{$value->id}}">{{$value->name}}</option>   
                                    @endforeach

                               </select>
                                @error('blood_group')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Education Q.</label>
                            <div class="col-sm-10">
                                <input name="education_qualification" type="text" class="form-control" value="{{$GetData->education_qualification}}" required>
                                @error('education_qualification')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Student</button>
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