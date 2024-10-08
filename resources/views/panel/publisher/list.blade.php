@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Publisher</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col lg-12">
          <a href="{{url('panel/publisher/add')}}" class="btn btn-primary bx-pull-right mb-3">Add New Publisher</a>
        </div>
      </div>
    <div class="row">
        <div class="col-lg-12">
            @include('_message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Publisher List</h5>
                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        @if (count($getRecord) > 0)
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                                @foreach($getRecord as $value)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->address }}</td>
                                        <td>{{ $value->mobile }}</td>
                                        <td>
                                            <a href="{{ url('panel/publisher/details/'.$value->id) }}" class="btn btn-info btn-sm">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                        @else
                        <div class="no-data mt-5 mb-5">
                            <h2>No publisher available</h2>
                        </div>
                        @endif
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection