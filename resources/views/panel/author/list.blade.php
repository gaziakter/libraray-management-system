@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Author List</h1>
    @include('_message')
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ url('panel/author/add') }}" class="btn btn-primary float-end mb-3">Add New Author</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Author List</h5>

                    <!-- Responsive Table Wrapper -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            @if (count($getRecord) > 0)
                                <thead>
                                    <tr>
                                        <th scope="col">Serial</th>
                                        <th scope="col">Author Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>@php echo $i++; @endphp</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>
                                                <a href="{{ url('panel/author/details/'.$value->id) }}" class="btn btn-info btn-sm">Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <div class="no-data mt-5 mb-5 text-center">
                                    <h2>No Author Available</h2>
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
