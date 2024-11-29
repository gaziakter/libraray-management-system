@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Student List</h1>
    @include('_message')
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{url('panel/student/add')}}" class="btn btn-primary float-end mb-3">Add New Student</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Student List</h5>

                    <!-- Responsive Table Wrapper -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            @if (count($getRecord) > 0)
                                <thead>
                                    <tr>
                                        <th scope="col">Serial</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $value->student_name }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->address }}</td>
                                            <td>
                                                <a href="{{ url('panel/student/details/'.$value->id) }}" class="btn btn-info btn-sm">Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <div class="no-data mt-5 mb-5 text-center">
                                    <h2>No Students Available</h2>
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
