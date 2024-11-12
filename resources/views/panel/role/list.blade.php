@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Roles</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col lg-12">
          <a href="{{url('panel/role/add')}}" class="btn btn-primary bx-pull-right mb-3">Add New Role</a>
        </div>
      </div>
    <div class="row">
        <div class="col-lg-12">
            @include('_message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Role List</h5>
                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        @if (count($roles) > 0)
                        <thead>
                            <tr>
                                <th style="width: 5%" scope="col">Serial</th>
                                <th style="width: 15%" scope="col">Role Name</th>
                                <th style="width: 65%" scope="col">Permissions</th>
                                <th style="width: 15%" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i =1; @endphp
                            @foreach($roles as $value)
                            <tr>
                                <td>@php echo $i++; @endphp</td>
                                <td>{{$value->name}}</td>
                                <td>
                                    @if ($value->permissions->isNotEmpty())
                                        @foreach ($value->permissions as $permission)
                                            <span class="">{{ $permission->name }}, </span>
                                        @endforeach
                                    @else
                                        <span class="text-muted">No Permissions</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('panel/role/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{url('panel/role/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                        @else
                        <div class="no-data mt-5 mb-5">
                            <h2>No Role available</h2>
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