@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Return Book</h1>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Book Return</h5>

                    <form action="{{ route('bookissue.returnBook', $bookIssue->id) }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Book Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $bookIssue->book->name }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Student Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $bookIssue->student->student_name }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Issue Date</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $bookIssue->issue_date }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Return Date</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $bookIssue->return_date }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Actual Return Date</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ \Carbon\Carbon::today()->format('F j, Y') }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Confirm Return</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
