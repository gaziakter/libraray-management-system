@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Add New Role</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add New Role</h5>

                    <!-- General Form Elements -->
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Role Name</label>
                            <div class="col-sm-10">
                                <input name="role_name" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" style="display: block; margin-bottom: 20px;" class="col-sm-2 col-form-label"><b>Permission</b></label>
                            
                            <!-- Loop through each group of permissions -->
                            @foreach($permissions as $group => $permissionsInGroup)
                            <div class="row" style="margin-bottom: 20px;">
                                <div class="col-md-2">
                                    {{ ucwords($group) }} <!-- Display the group name -->
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        @foreach($permissionsInGroup as $permission)
                                        <div class="col-md-3">
                                            <!-- Access permission's name directly -->
                                            <label>
                                                <input type="checkbox" value="{{ $permission->id }}" name="permission_id[]"> 
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

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
