@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Student List</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col lg-12">
          <a href="{{url('panel/student/add')}}" class="btn btn-primary bx-pull-right mb-3">Add New Student</a>
        </div>
      </div>
    <div class="row">
        <div class="col-lg-12">
            @include('_message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Student List</h5>
                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        @if (count($getRecord) > 0)
                        <thead>
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i =1; @endphp
                            @foreach($getRecord as $value)
                            <tr>
                                <td>@php echo $i++; @endphp</td>
                                <td>{{$value->student_name}}</td>
                                <td>
                                    @if (!empty($value->photo))
                                    <img src="{{asset('assets/upload/student/'.$value->photo)}}" alt="Profile" class="upload-img-size">
                                    @else
                                    <img src="{{asset('assets/upload/no_logo.jpg')}}" alt="Profile" class="upload-img-size">
                                    @endif
                                </td>
                                <td>{{$value->phone}}</td>
                                <td>{{$value->address}}</td>
                                <td>
                                    <a href="{{ url('panel/student/details/'.$value->id) }}" class="btn btn-info btn-sm">Details</a>
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                        @else
                        <div class="no-data mt-5 mb-5">
                            <h2>No Student available</h2>
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