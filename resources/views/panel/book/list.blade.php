@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Book List</h1>
    @include('_message')
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
          <a href="{{url('panel/book/add')}}" class="btn btn-primary bx-pull-right mb-3">Add New Book</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Book List</h5>
                    
                    <!-- Table with stripped rows and responsive wrapper -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            @if (count($books) > 0)
                            <thead>
                                <tr>
                                    <th scope="col" class="col-1">Book No.</th>
                                    <th scope="col" class="col-4">Book Name</th>
                                    <th scope="col" class="col-3">Author Name</th>
                                    <th scope="col" class="col-2">Status</th>
                                    <th scope="col" class="col-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $key => $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item['author']['name'] }}</td>
                                    <td><span class="badge bg-secondary">{{ ucwords($item->status) }}</span></td>
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
                    </div>
                    <!-- End responsive table wrapper -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
