@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Edit Role</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Role - {{ $role->name }}</h5>

                    <!-- Form to edit the role -->
                    <form action="{{ route('roles.update', $role->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <!-- Role Name -->
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Role Name</label>
                            <div class="col-sm-10">
                                <input name="role_name" type="text" class="form-control" value="{{ $role->name }}" required>
                            </div>
                        </div>

                        <!-- Permissions -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"><b>Permissions</b></label>

                            @foreach($permissions as $group => $permissionsInGroup)
                            <div class="row mb-3">
                                <div class="col-md-2">{{ ucwords($group) }}</div>
                                <div class="col-md-10">
                                    <div class="row">
                                        @foreach($permissionsInGroup as $permission)
                                        <div class="col-md-3">
                                            <label>
                                                <input type="checkbox" 
                                                       value="{{ $permission->id }}" 
                                                       name="permission_id[]"
                                                       {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}> 
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Update Role</button>
                            </div>
                        </div>

                    </form><!-- End Edit Role Form -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
