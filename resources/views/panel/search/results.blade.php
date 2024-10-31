<!-- resources/views/panel/book/search-results.blade.php -->
@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Search Results</h1>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card p-4">
                <div class="card-body">
                    <h5 class="card-title">Books Found</h5>

                    @if ($books->isEmpty())
                        <p>No books found matching your criteria.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Book ID</th>
                                    <th>Name</th>
                                    <th>Author</th>
                                    <th>Publisher</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->author->name }}</td>
                                        <td>{{ $book->publisher->name }}</td>
                                        <td>{{ $book->categories->pluck('name')->join(', ') }}</td>
                                        <td>{{ $book->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
