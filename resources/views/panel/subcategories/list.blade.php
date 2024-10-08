@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Sub Categories</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col lg-12">
          <a href="{{url('panel/category/add')}}" class="btn btn-primary bx-pull-right mb-3">Add New Sub Category</a>
        </div>
      </div>
    <div class="row">
        <div class="col-lg-12">
            @include('_message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sub Category List</h5>
                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        @if (count($getRecord) > 0)
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Sub Category Name</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i =1; @endphp
                            @foreach($getRecord as $value)
                            <tr>
                                <td>@php echo $i++; @endphp</td>
                                <td>{{$value->sub_category_name}}</td>
                                <td>{{$value->category_name}}</td>
                                <td>
                                    <a href="{{url('panel/subcategory/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{url('panel/subcategory/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                        @else
                        <div class="no-data mt-5 mb-5">
                            <h2>No Sub Category available</h2>
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