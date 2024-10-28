@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Search Results</h1>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <h5>Results for "{{ $query }}"</h5>

            @if ($books->isEmpty() && $students->isEmpty() && $issues->isEmpty())
                <div class="alert alert-warning">No results found.</div>
            @else
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Books</h5>
                        @if ($books->isEmpty())
                            <p>No books found.</p>
                        @else
                            <ul>
                                @foreach ($books as $book)
                                    <li><strong>{{ $book->name }}</strong> by {{ $book->author }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Students</h5>
                        @if ($students->isEmpty())
                            <p>No students found.</p>
                        @else
                            <ul>
                                @foreach ($students as $student)
                                    <li>{{ $student->student_name }} ({{ $student->phone }})</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Book Issues</h5>
                        @if ($issues->isEmpty())
                            <p>No book issues found.</p>
                        @else
                            <ul>
                                @foreach ($issues as $issue)
                                    <li>
                                        Book: {{ $issue->book->name }} |
                                        Issued to: {{ $issue->student->student_name }} |
                                        Status: {{ ucfirst($issue->status) }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
