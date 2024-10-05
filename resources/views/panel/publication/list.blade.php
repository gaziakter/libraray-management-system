@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Publication</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            @include('_message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Publication List</h5>
                    <a href="{{url('panel/publication/add')}}" class="btn btn-primary bx-pull-right">Add New Publication</a>
                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Website</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i =1;
                            @endphp
                            @foreach($getRecord as $value)
                            <tr>
                                <th scope="row">@php echo $i++; @endphp</th>
                                <td>{{$value->name}}</td>
                                <td>{{$value->address}}</td>
                                <td>{{$value->mobile}}</td>
                                <td>{{$value->website}}</td>
                                <td>
                                    <a href="{{url('panel/publication/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Show Details</a>
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection