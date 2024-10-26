@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Issue Book</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ url('panel/bookissue/add') }}" class="btn btn-primary float-end mb-3">Issue New Book</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @include('_message')

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Book Issue List</h5>

                    <table class="table table-striped">
                        @if (count($issues) > 0)
                            <thead>
                                <tr>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Book Info</th>
                                    <th scope="col">Student Info</th>
                                    <th scope="col">Issue Date</th>
                                    <th scope="col">Return Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($issues as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                        </div>
                                            <div class="row">
                                                <div class="col-md-5">Book No:</div>
                                                <div class="col-md-7">{{ $item->book->id }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">Book Name:</div>
                                                <div class="col-md-7">{{ $item->book->name }}</div>
                                            <div class="row">
                                                <div class="col-md-5">Book Photo:</div>
                                                <div class="col-md-7">
                                                    @if (!empty($item->book->img))
                                                        <img src="{{ asset('assets/upload/book/' . $item->book->img) }}" alt="Book Image" class="upload-img-size">
                                                    @else
                                                        <img src="{{ asset('assets/upload/no_logo.jpg') }}" alt="No Image" class="upload-img-size">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">Book Author:</div>
                                                <div class="col-md-7">{{ $item->book->author->name }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">Student Name:</div>
                                                <div class="col-md-6">{{ $item->student->student_name }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">Father's Name:</div>
                                                <div class="col-md-6">{{ $item->student->father_name }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">Mobile:</div>
                                                <div class="col-md-6">{{ $item->student->phone }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">Address:</div>
                                                <div class="col-md-6">{{ $item->student->address }}</div>
                                            </div>
                                        </td>
                                        <td>{{ $item->issue_date }}</td>
                                        <td>{{ $item->return_date }}</td>
                                        <td>{{ ucfirst($item->status) }}</td>
                                        <td>
                                            <a href="{{ url('panel/bookissue/edit/' . $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                                            @if ($item->status === 'issued')
                                                <a href="{{ url('panel/bookissue/return/' . $item->id) }}" class="btn btn-success btn-sm">Return</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <div class="no-data mt-5 mb-5 text-center">
                                <h2>No Book Issues Available</h2>
                            </div>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
