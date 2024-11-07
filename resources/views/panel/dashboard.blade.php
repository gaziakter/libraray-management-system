
@extends('panel.layouts.app')

    @section('content')
    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard" style="height: 100vh;">
      <div class="row">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body text-center pt-5 pb-5">
              <div class="dashboard-box pt-4 pb-4">
                <h2>{{$book}}</h2>
                <h3>Books Listed</h3>
                <h4><a href="{{url('panel/book')}}"class="badge bg-info mt-3">Show Details</a></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body text-center pt-5 pb-5">
              <div class="dashboard-box pt-4 pb-4">
                <h2>{{$student}}</h2>
                <h3>Students Registed</h3>
                <h4><a href="{{url('panel/student')}}"class="badge bg-info mt-3">Show Details</a></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body text-center pt-5 pb-5">
              <div class="dashboard-box pt-4 pb-4">
                <h2>{{$author}}</h2>
                <h3>Authors Listed</h3>
                <h4><a href="{{url('panel/author')}}"class="badge bg-info mt-3">Show Details</a></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body text-center pt-5 pb-5">
              <div class="dashboard-box pt-4 pb-4">
                <h2>{{$publisher}}</h2>
                <h3>Publishers Listed</h3>
                <h4><a href="{{url('panel/publisher')}}"class="badge bg-info mt-3">Show Details</a></h4>
              </div>
            </div>
          </div>
        </div>
      
      </div>
    </section>
    @endsection