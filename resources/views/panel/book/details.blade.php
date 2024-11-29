@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Book Details</h1>
    @include('_message')
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row mb-3">
        <div class="col-lg-12 text-end">
            <a href="{{url('panel/book/add')}}" class="btn btn-primary">Add New Book</a>
        </div>
    </div>
    <div class="row">
        <!-- Book Image and Actions -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <img src="{{ !empty($books->img) ? asset('assets/upload/book/'.$books->img) : asset('assets/upload/no_logo.jpg') }}" 
                         alt="Book Image" class="upload-img-size img-fluid">
                    <h2 class="mt-3">{{$books->name}}</h2>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body text-center">
                    @if ($books->status == 'issued')
                        <a href="{{ url('panel/bookissue/return/' . $books->id) }}" class="btn btn-primary btn-sm">Return</a>
                    @else
                        <a href="{{ url('panel/bookissue/specific/' . $books->id) }}" class="btn btn-primary btn-sm">Issue</a>
                    @endif
                    <a href="{{ url('panel/book/edit/' . $books->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                    <a href="{{ url('panel/book/delete/' . $books->id) }}" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>
        </div>

        <!-- Book Details -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Book Details Info</h5>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="fw-bold" style="width: 25%;">Book Name</td>
                                    <td style="width: 5%;">:</td>
                                    <td>{{$books->name}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Author Name</td>
                                    <td>:</td>
                                    <td>{{$books->author->name}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Book Price</td>
                                    <td>:</td>
                                    <td>{{$books->price}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Publisher Name</td>
                                    <td>:</td>
                                    <td>{{$books->publisher->name}}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Categories</td>
                                    <td>:</td>
                                    <td>
                                        @if ($books->categories->isNotEmpty())
                                            @foreach ($books->categories as $category)
                                                <span class="badge bg-primary">{{$category->category_name}}</span>
                                            @endforeach
                                        @else
                                            <span>No Categories Assigned</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Sub Categories</td>
                                    <td>:</td>
                                    <td>
                                        @if ($books->subcategories->isNotEmpty())
                                            @foreach ($books->subcategories as $subcategory)
                                                <span class="badge bg-secondary">{{$subcategory->name}}</span>
                                            @endforeach
                                        @else
                                            <span>No Subcategories Assigned</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Status</td>
                                    <td>:</td>
                                    <td>{{ ucwords($books->status) }}</td>
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
