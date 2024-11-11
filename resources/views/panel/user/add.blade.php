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
                    <form action="" method="post">
                        {{csrf_field()}}
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" value="{{old('name')}}" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Email Address</label>
                            <div class="col-sm-10">
                                <input name="email" type="email" value="{{old('email')}}" class="form-control" required>
                                <div style="color:red">{{$errors->first('email')}}</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input name="password" type="password" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Choose Role</label>
                            <div class="col-sm-10">
                               <select class="form-control" name="role_id" required>
                                    <option value="">Selete Role</option>
                                    @foreach ($getRole as $value )
                                    <option {{old('role_id') == $value->id ? 'selected' : '' }} value="{{$value->id}}">{{$value->name}}</option>   
                                    @endforeach
                               </select>
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