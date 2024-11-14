
@extends('panel.layouts.app')

    @section('content')
    <div class="pagetitle">
      <h1>Dashboard</h1>
      @include('_message')
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-4">
          <div class="card">
            <div class="card-body text-center pt-5 pb-5">
              @if ($book == 0)
              <div class="dashboard-box pt-4 pb-4">
                <h3>Book Not Available</h3>
              </div>
              @elseif ($book == 1)
              <div class="dashboard-box pt-4 pb-4">
                <h2>{{$book}}</h2>
                <h3>Book Listed</h3>
                <h4><a href="{{url('panel/book')}}"class="badge bg-info mt-3">Show Details</a></h4>
              </div>
              @else
              <div class="dashboard-box pt-4 pb-4">
                <h2>{{$book}}</h2>
                <h3>Books Listed</h3>
                <h4><a href="{{url('panel/book')}}"class="badge bg-info mt-3">Show Details</a></h4>
              </div>
              @endif
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card">
            <div class="card-body text-center pt-5 pb-5">
              @if ($issue == 0)
              <div class="dashboard-box pt-4 pb-4">
                <h3>Book Issue Not Available</h3>
              </div>
              @elseif ($issue == 1)
              <div class="dashboard-box pt-4 pb-4">
                <h2>{{$issue}}</h2>
                <h3>Book Issued</h3>
                <h4><a href="{{url('panel/book')}}"class="badge bg-info mt-3">Show Details</a></h4>
              </div>
              @else
              <div class="dashboard-box pt-4 pb-4">
                <h2>{{$issue}}</h2>
                <h3>Books Issued</h3>
                <h4><a href="{{url('panel/book')}}"class="badge bg-info mt-3">Show Details</a></h4>
              </div>
              @endif
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card">
            <div class="card-body text-center pt-5 pb-5">
              @if ($student == 0)
              <div class="dashboard-box pt-4 pb-4">
                <h3>Student Not Available</h3>
              </div>
              @elseif ($student == 1)
              <div class="dashboard-box pt-4 pb-4">
                <h2>{{$student}}</h2>
                <h3>Student Listed</h3>
                <h4><a href="{{url('panel/book')}}"class="badge bg-info mt-3">Show Details</a></h4>
              </div>
              @else
              <div class="dashboard-box pt-4 pb-4">
                <h2>{{$student}}</h2>
                <h3>Students Listed</h3>
                <h4><a href="{{url('panel/book')}}"class="badge bg-info mt-3">Show Details</a></h4>
              </div>
              @endif
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card">
            <div class="card-body text-center pt-5 pb-5">
              @if ($author == 0)
              <div class="dashboard-box pt-4 pb-4">
                <h3>Author Not Available</h3>
              </div>
              @elseif ($author == 1)
              <div class="dashboard-box pt-4 pb-4">
                <h2>{{$author}}</h2>
                <h3>Author Listed</h3>
                <h4><a href="{{url('panel/book')}}"class="badge bg-info mt-3">Show Details</a></h4>
              </div>
              @else
              <div class="dashboard-box pt-4 pb-4">
                <h2>{{$author}}</h2>
                <h3>Authors Listed</h3>
                <h4><a href="{{url('panel/book')}}"class="badge bg-info mt-3">Show Details</a></h4>
              </div>
              @endif
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card">
            <div class="card-body text-center pt-5 pb-5">
              @if ($publisher == 0)
              <div class="dashboard-box pt-4 pb-4">
                <h3>Publisher Not Available</h3>
              </div>
              @elseif ($publisher == 1)
              <div class="dashboard-box pt-4 pb-4">
                <h2>{{$publisher}}</h2>
                <h3>Publisher Listed</h3>
                <h4><a href="{{url('panel/book')}}"class="badge bg-info mt-3">Show Details</a></h4>
              </div>
              @else
              <div class="dashboard-box pt-4 pb-4">
                <h2>{{$publisher}}</h2>
                <h3>Publishers Listed</h3>
                <h4><a href="{{url('panel/book')}}"class="badge bg-info mt-3">Show Details</a></h4>
              </div>
              @endif
            </div>
          </div>
        </div>
      
      </div>
    </section>
    @endsection