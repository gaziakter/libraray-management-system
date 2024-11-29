@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Sub Categories</h1>
    @include('_message')
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{url('panel/subcategory/add')}}" class="btn btn-primary float-end mb-3">Add New Sub Category</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sub Category List</h5>

                    <!-- Responsive Table Wrapper -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            @if (count($subCategories) > 0)
                                <thead>
                                    <tr>
                                        <th scope="col">Serial</th>
                                        <th scope="col">Sub Category Name</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($subCategories as $value)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->category->category_name }}</td>
                                            <td>
                                                <a href="{{url('panel/subcategory/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{url('panel/subcategory/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <div class="no-data mt-5 mb-5 text-center">
                                    <h2>No Sub Categories Available</h2>
                                </div>
                            @endif
                        </table>
                    </div>
                    <!-- End responsive table wrapper -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
