@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Issue Book</h1>
    @include('_message')

</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ url('panel/bookissue/add') }}" class="btn btn-primary float-end mb-3">Issue New Book</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
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
                                            <div class="mb-2">
                                                <di><strong>Book No: </strong>{{ $item->book->id }}</di>
                                            </div>
                                            <div class="mb-2">
                                                <div><strong>Book Name:</strong></div>
                                                <div>{{ $item->book->name }}</div>
                                            </div>
                                            <div class="mb-2">
                                                <div><strong>Book Photo:</strong></div>
                                                <div>
                                                    @if (!empty($item->book->img))
                                                        <img src="{{ asset('assets/upload/book/' . $item->book->img) }}" alt="Book Image" class="upload-img-size">
                                                    @else
                                                        <img src="{{ asset('assets/upload/no_logo.jpg') }}" alt="No Image" class="upload-img-size">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <div><strong>Book Author:</strong></div>
                                                <div>{{ $item->book->author->name }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mb-2">
                                                <div><strong>Student ID: </strong>{{ $item->student->id }}</div>
                                            </div>
                                            <div class="mb-2">
                                                <div><strong>Student Name:</strong></div>
                                                <div>{{ $item->student->student_name }}</div>
                                            </div>
                                            <div class="mb-2">
                                                <div><strong>Student Photo:</strong></div>
                                                <div>
                                                    @if (!empty($item->student->photo))
                                                        <img src="{{ asset('assets/upload/student/' . $item->student->photo) }}" alt="Book Image" class="upload-img-size">
                                                    @else
                                                        <img src="{{ asset('assets/upload/no_logo.jpg') }}" alt="No Image" class="upload-img-size">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <div><strong>Father's Name:</strong></strong></div>
                                                <div>{{ $item->student->father_name }}</div>
                                            </div>
                                            <div class="mb-2">
                                                <div><strong>Mobile:</strong></div>
                                                <div>{{ $item->student->phone }}</div>
                                            </div>
                                            <div class="mb-2">
                                                <div><strong>Address:</strong></div>
                                                <div>{{ $item->student->address }}</div>
                                            </div>
                                        </td>
                                        <td>{{ $item->issue_date }}</td>
                                        <td>{{ $item->return_date }}</td>
                                        <td>
                                            @if ($item->status == 'returned')
                                                <span class='badge bg-secondary'>Returned</span>
                                            @else
                                                <span class='badge bg-secondary'>Issued</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status === 'issued')
                                                <a href="{{ url('panel/bookissue/return/' . $item->id) }}" class="btn btn-success btn-sm">Return</a>
                                            @else
                                                <p>Return Date: </p>
                                                <span class='badge bg-secondary'>{{ $item->actual_return_date }}</span>
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
