@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Author Profile</h1>
    @include('_message')
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
      <div class="col lg-12">
        <a href="{{url('panel/author/add')}}" class="btn btn-primary bx-pull-right mb-3">Add New Author</a>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    @if (!empty($getRecord->photo))
                        <img src="{{asset('assets/upload/author/'.$getRecord->photo)}}" alt="Profile" class="upload-img-size">
                    @else
                    <img src="{{asset('assets/upload/no_logo.jpg')}}" alt="Profile" class="upload-img-size">
                    @endif


                    <h2>{{$getRecord->name}}</h2>
                  </div>
            </div>
            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <div>
                  <a href="{{url('panel/author/edit/'.$getRecord->id)}}" class="d-inline btn badge bg-success btn-sm">Edit</a>
                  <a href="{{url('panel/author/delete/'.$getRecord->id)}}" class="d-inline btn btn-danger btn-sm">Delete</a>
                </div>
                </div>
          </div>

        </div>
        <div class="col-lg-8">
            <div class="card">
            <div class="card-body">
                <div class="tab-content">
  
                  <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                    <h5 class="card-title">Author Details</h5>
  
                    <div class="row mb-3">
                      <div class="col-lg-3 col-md-3 label"><b>Author Name</b></div>
                      <div class="col-lg-1 col-md-1">:</div>
                      <div class="col-lg-8 col-md-8">{{$getRecord->name}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 label"><b>Address</b></div>
                        <div class="col-lg-1 col-md-1">:</div>
                        <div class="col-lg-8 col-md-8">{{$getRecord->address}}</div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 label"><b>Email Address</b></div>
                        <div class="col-lg-1 col-md-1">:</div>
                        <div class="col-lg-8 col-md-8">{{$getRecord->email}}</div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 label"><b>Mobile Number</b></div>
                        <div class="col-lg-1 col-md-1">:</div>
                        <div class="col-lg-8 col-md-8">{{$getRecord->mobile}}</div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 label"><b>Website</b></div>
                        <div class="col-lg-1 col-md-1">:</div>
                        <div class="col-lg-8 col-md-8">{{$getRecord->website}}</div>
                      </div>


                  </div>
                </div>
                </div><!-- End Bordered Tabs -->
  
              </div>
        </div>
    </div>
</section>
@endsection



