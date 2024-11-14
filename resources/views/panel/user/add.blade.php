@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Add New User</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add New User</h5>

                    <!-- General Form Elements -->
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" value="{{ old('name') }}" class="form-control">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input name="username" type="text" value="{{ old('username') }}" class="form-control">
                                @if($errors->has('username'))
                                    <div style="color:red">{{ $errors->first('username') }}</div>
                                @endif
                                @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Email Address</label>
                            <div class="col-sm-10">
                                <input name="email" type="email" value="{{ old('email') }}" class="form-control">
                                @if($errors->has('email'))
                                    <div style="color:red">{{ $errors->first('email') }}</div>
                                @endif
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input name="password" type="password" class="form-control">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Choose Role</label>
                            <div class="col-sm-10">
                               <select class="form-control" name="role_id">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>   
                                    @endforeach
                               </select>
                               @if($errors->has('role_id'))
                                    <div style="color:red">{{ $errors->first('role_id') }}</div>
                                @endif
                                @error('role_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
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
