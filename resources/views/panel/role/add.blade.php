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
                        {{csrf_field()}}
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Role Name</label>
                            <div class="col-sm-10">
                                <input name="role_name" type="text" class="form-control" value="{{ old('role_name') }}" required>
                                @error('role_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Create Role</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection