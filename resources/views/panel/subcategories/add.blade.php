@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Add New Sub Category</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add New Sub Category</h5>

                    <!-- General Form Elements -->
                    <form action="" method="post">
                        {{csrf_field()}}
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Sub Category Name</label>
                            <div class="col-sm-9">
                                <input name="sub_category_name" type="text" class="form-control" value="{{ old('sub_category_name') }}">
                                @error('sub_category_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_name">
                                    <option value="">Selete Category</option>
                                    @foreach ($getCategory as $value )
                                    <option {{old('category_id') == $value->id ? 'selected' : '' }} value="{{$value->id}}">{{$value->category_name}}</option>   
                                    @endforeach
                               </select>
                                @error('category_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Create Sub Category</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection