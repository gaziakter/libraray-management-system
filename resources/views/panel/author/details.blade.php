@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Author Profile</h1>
    @include('_message')
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row mb-3">
        <div class="col-lg-12 text-end">
            <a href="{{url('panel/author/add')}}" class="btn btn-primary">Add New Author</a>
        </div>
    </div>

    <div class="row">
        <!-- Author Image and Actions -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <img src="{{ !empty($getRecord->photo) ? asset('assets/upload/author/'.$getRecord->photo) : asset('assets/upload/no_logo.jpg') }}" 
                         alt="Profile" class="upload-img-size img-fluid rounded-circle">
                    <h2 class="mt-3">{{$getRecord->name}}</h2>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body text-center">
                    <a href="{{url('panel/author/edit/'.$getRecord->id)}}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{url('panel/author/delete/'.$getRecord->id)}}" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>
        </div>

        <!-- Author Details -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Author Details</h5>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="fw-bold" style="width: 25%;">Author Name</td>
                                    <td style="width: 5%;">:</td>
                                    <td>{{$getRecord->name}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Address</td>
                                    <td>:</td>
                                    <td>{{$getRecord->address}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Email Address</td>
                                    <td>:</td>
                                    <td>{{$getRecord->email}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Mobile Number</td>
                                    <td>:</td>
                                    <td>{{$getRecord->mobile}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Website</td>
                                    <td>:</td>
                                    <td>{{$getRecord->website}}</td>
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
