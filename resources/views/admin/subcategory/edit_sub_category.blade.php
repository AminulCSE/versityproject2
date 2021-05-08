@extends('layouts.backapp')
@section('backend_content')
<div class="pcoded-content">
<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->
            
            <!-- Page-header end -->
                
                <div class="page-body">
                    <!-- Config. table start -->
                    <div class="card col-md-10 m-auto">
                        <div class="card-header">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <h5>Edit Sub Category</h5>
                            <a class="btn btn-primary float-right" href="{{ url('subcategory/all_sub_category') }}">All Sub Category</a>
                        </div>

                        <div class="card-block">
                            <form action="{{ url('subcategory/update_sub_category/'.$edit_sub_category->id) }}" method="POST">
                                @csrf

                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Select Category</label>
                                    <div class="col-sm-7">
                                        <select name="category_id" class="form-control">
                                            @foreach($all_category as $all_cat_row)
                                            <option
                                            @if($edit_sub_category->category_id == $all_cat_row->id) selected="" @endif
                                            value="{{ $all_cat_row->id }}">

                                            {{ $all_cat_row->category_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="sub_category_name" class="col-sm-3 col-form-label">Sub Category Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="sub_category_name" name="sub_category_name" value="{{ $edit_sub_category->sub_category_name }}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Select Status</label>
                                    <div class="col-sm-7">
                                        <select name="status" class="form-control">
                                            <option {{ $edit_sub_category->status == "1" ? "selected" : " " }} value="1">Active</option>
                                            <option {{ $edit_sub_category->status == "0" ? "selected" : " " }} value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-7">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Config. table end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection