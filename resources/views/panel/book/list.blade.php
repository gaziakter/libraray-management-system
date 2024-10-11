@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Book List</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col lg-12">
          <a href="{{url('panel/book/add')}}" class="btn btn-primary bx-pull-right mb-3">Add New Book</a>
        </div>
      </div>
    <div class="row">
        <div class="col-lg-12">
            @include('_message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Book List</h5>
                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        @if (count($books) > 0)
                        <thead>
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Writer Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $key => $item)
                            <tr>
                                <td>{{ $key+1}}</td>
                                <td>
                                    @if (!empty($item->img))
                                    <img src="{{asset('assets/upload/book/'.$item->img)}}" alt="Profile" class="upload-img-size">
                                    @else
                                    <img src="{{asset('assets/upload/no_logo.jpg')}}" alt="Profile" class="upload-img-size">
                                    @endif
                                </td>
                                <td>{{ $item->name}}</td>
                                <td>{{ $item['writer']['name']}}</td>  
                                <td>
                                    <a href="{{ url('panel/book/details/'.$item->id) }}" class="btn btn-info btn-sm">Details</a>
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                        @else
                        <div class="no-data mt-5 mb-5">
                            <h2>No Book available</h2>
                        </div>
                        @endif
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection