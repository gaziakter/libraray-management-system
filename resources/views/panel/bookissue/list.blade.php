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
                                    <th scope="col">Book Name</th>
                                    <th scope="col">Student Name</th>
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
                                        <td><a href="{{ url('panel/book/details/'.$item->book->id) }}">{{ $item->book->name }}</a></td>
                                        <td><a href="{{ url('panel/student/details/'.$item->student->id) }}">{{ $item->student->student_name }}</a></td>
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
