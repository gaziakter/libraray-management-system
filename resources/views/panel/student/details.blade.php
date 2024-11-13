@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Student Profile</h1>
    @include('_message')
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
      <div class="col lg-12">
        <a href="{{url('panel/student/add')}}" class="btn btn-primary bx-pull-right mb-3">Add New Student</a>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    @if (!empty($GetData->photo))
                        <img src="{{asset('assets/upload/student/'.$GetData->photo)}}" alt="Profile" class="upload-img-size">
                    @else
                    <img src="{{asset('assets/upload/no_logo.jpg')}}" alt="Profile" class="upload-img-size">
                    @endif


                    <h2>{{$GetData->student_name}}</h2>
                  </div>
            </div>
            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <div>
                  <a href="{{url('panel/student/edit/'.$GetData->id)}}" class="d-inline btn badge bg-success btn-sm">Edit</a>
                  <a href="{{url('panel/student/delete/'.$GetData->id)}}" class="d-inline btn btn-danger btn-sm">Delete</a>
                </div>
                </div>
          </div>

        </div>
        <div class="col-lg-8">
            <div class="card">
            <div class="card-body">
                <div class="tab-content">
  
                  <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                    <h5 class="card-title">Student Details</h5>
  
                    <div class="row mb-3">
                      <div class="col-lg-3 col-md-3 label"><b>Student Name</b></div>
                      <div class="col-lg-1 col-md-1">:</div>
                      <div class="col-lg-8 col-md-8">{{$GetData->student_name}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 label"><b>Father Name</b></div>
                        <div class="col-lg-1 col-md-1">:</div>
                        <div class="col-lg-8 col-md-8">{{$GetData->father_name}}</div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 label"><b>Address</b></div>
                        <div class="col-lg-1 col-md-1">:</div>
                        <div class="col-lg-8 col-md-8">{{$GetData->address}}</div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 label"><b>Email Address</b></div>
                        <div class="col-lg-1 col-md-1">:</div>
                        <div class="col-lg-8 col-md-8">{{$GetData->email}}</div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 label"><b>Mobile Number</b></div>
                        <div class="col-lg-1 col-md-1">:</div>
                        <div class="col-lg-8 col-md-8">{{$GetData->phone}}</div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 label"><b>Date of Birth</b></div>
                        <div class="col-lg-1 col-md-1">:</div>
                        <div class="col-lg-8 col-md-8">{{$GetData->date_of_birth->format('F j, Y')}}</div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 label"><b>Blood Group</b></div>
                        <div class="col-lg-1 col-md-1">:</div>
                        <div class="col-lg-8 col-md-8">{{$GetData->blood->name}}</div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 label"><b>Education Qualification</b></div>
                        <div class="col-lg-1 col-md-1">:</div>
                        <div class="col-lg-8 col-md-8">{{$GetData->education_qualification}}</div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 label"><b>Gender</b></div>
                        <div class="col-lg-1 col-md-1">:</div>
                        <div class="col-lg-8 col-md-8">{{ucwords($GetData->gender)}}</div>
                      </div>


                  </div>
                </div>
                </div><!-- End Bordered Tabs -->
  
              </div>
        </div>
    </div>
</section>
@endsection



