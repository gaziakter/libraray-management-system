@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Search Results</h1>
</div>

<section class="section dashboard">
    <div class="row">
        @if ($books->isEmpty())
            <p class="text-center">No books found matching your criteria.</p>
        @else
            @foreach ($books as $book)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <!-- Card with an image on top -->
                    <div class="card">
                        <!-- Book Image -->
                        @if (!empty($book->img))
                            <img src="{{asset('assets/upload/book/'.$book->img)}}" 
                                 class="card-img-top img-fluid" 
                                 alt="{{ $book->name }}">
                        @else
                            <img src="{{asset('assets/upload/no_logo.jpg')}}" 
                                 class="card-img-top img-fluid" 
                                 alt="No Image Available">
                        @endif
                        
                        <!-- Card Body -->
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $book->name }}</h5>
                            
                            <!-- Book Details -->
                            <div class="book-details">
                                <div class="row mb-2">
                                    <div class="col-4 fw-bold">Book No</div>
                                    <div class="col-1">:</div>
                                    <div class="col-7 text-truncate">{{ $book->id }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4 fw-bold">Author</div>
                                    <div class="col-1">:</div>
                                    <div class="col-7 text-truncate">{{ $book->author->name }}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4 fw-bold">Category</div>
                                    <div class="col-1">:</div>
                                    <div class="col-7">
                                        @if ($book->categories)
                                            @foreach ($book->categories as $category)
                                                {{ $category->category_name }}@if(!$loop->last), @endif
                                            @endforeach
                                        @else
                                            Not Available
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4 fw-bold">Sub Category</div>
                                    <div class="col-1">:</div>
                                    <div class="col-7">
                                        @if ($book->subcategories)
                                            @foreach ($book->subcategories as $subcategory)
                                                {{ $subcategory->name }}@if(!$loop->last), @endif
                                            @endforeach
                                        @else
                                            Not Available
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4 fw-bold">Status</div>
                                    <div class="col-1">:</div>
                                    <div class="col-7">{{ ucwords($book->status) }}</div>
                                </div>
                                <!-- Action Buttons -->
                                <div class="row">
                                    <div class="col-12 mt-3 text-center">
                                        @if ($book->status == 'issued')
                                            <a href="{{ url('panel/bookissue/specificreturn/' . $book->id) }}" 
                                               class="btn btn-primary btn-sm me-2">Return</a>
                                        @else
                                            <a href="{{ url('panel/bookissue/specific/'.$book->id) }}" 
                                               class="btn btn-primary btn-sm me-2">Issue</a>
                                        @endif
                                        <a href="{{ url('panel/book/details/'.$book->id) }}" 
                                           class="btn btn-info btn-sm">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Card -->
                </div>
            @endforeach
        @endif
    </div>
</section>

@endsection
