@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>User</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            @include('_message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">User List</h5>
                    <a href="{{url('panel/user/add')}}" class="btn btn-primary bx-pull-right mb-3">Add New User</a>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getRecord as $value)
                            <tr>
                                <th scope="row">{{$value->id}}</th>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{ $value->role->name ?? 'No Role Assigned' }}</td>
                                <td>
                                    <a href="{{url('panel/user/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{url('panel/user/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
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
