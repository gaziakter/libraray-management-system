@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Issue New Book</h1>
</div><!-- End Page Title -->

@include('_message')

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Issue New Book</h5>

                    <!-- General Form Elements -->
                    <form action="{{ url('panel/bookissue/add') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <!-- Student Selection -->
                        <div class="row mb-3">
                            <label for="student" class="col-sm-3 col-form-label">Select Student</label>
                            <div class="col-sm-9">
                                <select name="student" class="form-control" required>
                                    <option value="">Select Student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->student_name }}</option>
                                    @endforeach
                                </select>
                                @error('student')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Book Selection -->
                        <div class="row mb-3">
                            <label for="book" class="col-sm-3 col-form-label">Select Book</label>
                            <div class="col-sm-9">
                                <select name="book" class="form-control" required>
                                    <option value="">Select Book</option>
                                    @foreach ($books as $book)
                                        <option value="{{ $book->id }}" 
                                            {{ isset($selectedBookId) && $selectedBookId == $book->id ? 'selected' : '' }}>
                                            {{ $book->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('book')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Return Date Selection -->
                        <div class="row mb-3">
                            <label for="return_date" class="col-sm-3 col-form-label">Return Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="return_date" class="form-control" required>
                                @error('return_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Issue Book</button>
                            </div>
                        </div>
                    </form><!-- End General Form Elements -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
