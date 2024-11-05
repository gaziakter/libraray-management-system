@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Search Results</h1>
</div>

<section class="section dashboard">
    <div class="row">
        @if ($books->isEmpty())
            <p>No books found matching your criteria.</p>
        @else
            @foreach ($books as $book)
                <div class="col-lg-6">
                    <!-- Card with an image on top -->
                    <div class="card">
                        <img src="{{ asset('assets/img/card.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->name }}</h5>
                            <div class="book-details">
                                <div class="row mb-3">
                                    <div class="col-lg-4">Book No</div>
                                    <div class="col-lg-1">:</div>
                                    <div class="col-lg-7">{{ $book->id }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">Author</div>
                                    <div class="col-lg-1">:</div>
                                    <div class="col-lg-7">{{ $book->author->name }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">Category</div>
                                    <div class="col-lg-1">:</div>
                                    <div class="col-lg-7">
                                        @if ($book->categories)
                                            @foreach ($book->categories as $category)
                                            {{ $category->category_name }}@if(!$loop->last), @endif
                                            @endforeach
                                        @else
                                        Category not available
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">Sub Category</div>
                                    <div class="col-lg-1">:</div>
                                    <div class="col-lg-7">
                                        @if ($book->subcategories)
                                            @foreach ($book->subcategories as $subcategory)
                                                {{ $subcategory->name }}@if(!$loop->last), @endif
                                            @endforeach
                                        @else
                                        Sub Category not available
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4">Status</div>
                                    <div class="col-lg-1">:</div>
                                    <div class="col-lg-7">{{ ucwords($book->status) }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        @if ($book->status == 'issued')
                                            <a href="{{ url('panel/bookissue/return/' . $book->id) }}" class="d-inline btn btn-primary btn-sm">Return</a>
                                        @else
                                            <a href="#" class="d-inline btn btn-primary btn-sm">Issue</a>
                                        @endif
                                        <a href="{{ url('panel/book/details/'.$book->id) }}" class="btn btn-info btn-sm">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Card with an image on top -->
                </div>
            @endforeach
        @endif
    </div>
</section>
@endsection
