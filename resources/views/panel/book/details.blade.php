@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Book Details</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
      <div class="col lg-12">
        <a href="{{url('panel/book/add')}}" class="btn btn-primary bx-pull-right mb-3">Add New Book</a>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    @if (!empty($books->img))
                        <img src="{{asset('assets/upload/book/'.$books->img)}}" alt="Profile" class="upload-img-size">
                    @else
                    <img src="{{asset('assets/upload/no_logo.jpg')}}" alt="Profile" class="rounded-circle upload-img-size">
                    @endif


                    <h2>{{$books->name}}</h2>
                  </div>
            </div>
            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <div>
                  <a href="{{url('panel/book/edit/'.$books->id)}}" class="d-inline btn btn-secondary btn-sm">Edit</a>
                  <a href="{{url('panel/book/delete/'.$books->id)}}" class="d-inline btn btn-danger btn-sm">Delete</a>
                </div>
                </div>
          </div>

        </div>
        <div class="col-lg-8">
            <div class="card">
            <div class="card-body">
                <div class="tab-content">
                  
                  <div class="tab-pane fade profile-overview active show" id="profile-overview" role="tabpanel">
                    <h5 class="card-title">Book Details Info</h5>
  
                    <div class="row mb-3">
                      <div class="col-lg-3 col-md-3 label"><b>Book Name</b></div>
                      <div class="col-lg-1 col-md-1">:</div>
                      <div class="col-lg-8 col-md-8">{{$books->name}}</div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-lg-3 col-md-3 label"><b>Writer Name</b></div>
                      <div class="col-lg-1 col-md-1">:</div>
                      <div class="col-lg-8 col-md-8">{{$books['writer']['name']}}</div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-lg-3 col-md-3 label"><b>Book Price</b></div>
                      <div class="col-lg-1 col-md-1">:</div>
                      <div class="col-lg-8 col-md-8">{{$books->price}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 label"><b>Publisher Name</b></div>
                        <div class="col-lg-1 col-md-1">:</div>
                        <div class="col-lg-8 col-md-8">{{$books['publisher']['name']}}</div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 label"><b>Category Name</b></div>
                        <div class="col-lg-1 col-md-1">:</div>
                        <div class="col-lg-8 col-md-8">{{$books['category']['category_name']}}</div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-3 col-md-3 label"><b>Sub Category</b></div>
                        <div class="col-lg-1 col-md-1">:</div>
                        <div class="col-lg-8 col-md-8">{{$books['subcategory']['sub_category_name']}}</div>
                      </div>
                  </div>
                </div>
                </div><!-- End Bordered Tabs -->
  
              </div>
        </div>
    </div>
</section>
@endsection



