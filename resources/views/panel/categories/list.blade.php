@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Categories</h1>
    @include('_message')
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col lg-12">
          <a href="{{url('panel/category/add')}}" class="btn btn-primary bx-pull-right mb-3">Add New Category</a>
        </div>
      </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Category List</h5>
                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        @if (count($getRecord) > 0)
                        <thead>
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i =1; @endphp
                            @foreach($getRecord as $value)
                            <tr>
                                <td>@php echo $i++; @endphp</td>
                                <td>{{$value->category_name}}</td>
                                <td>{{$value->description}}</td>
                                <td>
                                    <a href="{{url('panel/category/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{url('panel/category/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                        @else
                        <div class="no-data mt-5 mb-5">
                            <h2>No Category available</h2>
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