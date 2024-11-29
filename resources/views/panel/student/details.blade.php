@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Student Profile</h1>
    @include('_message')
</div><!-- End Page Title -->

<section class="section dashboard">
    <!-- Add New Student Button -->
    <div class="row mb-3">
        <div class="col-lg-12 text-end">
            <a href="{{url('panel/student/add')}}" class="btn btn-primary">Add New Student</a>
        </div>
    </div>

    <div class="row">
        <!-- Profile Image and Actions -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <img src="{{ !empty($GetData->photo) ? asset('assets/upload/student/'.$GetData->photo) : asset('assets/upload/no_logo.jpg') }}" 
                         alt="Profile" class="upload-img-size img-fluid rounded-circle">
                    <h2 class="mt-3">{{$GetData->student_name}}</h2>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body text-center">
                    <a href="{{url('panel/student/edit/'.$GetData->id)}}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{url('panel/student/delete/'.$GetData->id)}}" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>
        </div>

        <!-- Student Details -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Student Details</h5>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="fw-bold" style="width: 25%;">Student Name</td>
                                    <td style="width: 5%;">:</td>
                                    <td>{{$GetData->student_name}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Father Name</td>
                                    <td>:</td>
                                    <td>{{$GetData->father_name}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Address</td>
                                    <td>:</td>
                                    <td>{{$GetData->address}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Email Address</td>
                                    <td>:</td>
                                    <td>{{$GetData->email}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Mobile Number</td>
                                    <td>:</td>
                                    <td>{{$GetData->phone}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Date of Birth</td>
                                    <td>:</td>
                                    <td>{{$GetData->date_of_birth->format('F j, Y')}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Blood Group</td>
                                    <td>:</td>
                                    <td>{{$GetData->blood->name}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Education Qualification</td>
                                    <td>:</td>
                                    <td>{{$GetData->education_qualification}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Gender</td>
                                    <td>:</td>
                                    <td>{{ucwords($GetData->gender)}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
