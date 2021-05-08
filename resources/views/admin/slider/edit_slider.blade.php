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

                                <h5>Add Slider</h5>
                                <a class="btn btn-primary float-right" href="{{ url('slider/all_slider') }}">All Slider</a>
                            </div>

                            <div class="card-block">
                                <form action="{{ url('slider/update_slider/'.$edit_slider->id) }}" method="POST" enctype='multipart/form-data'>
                                    @csrf

                                    <input type="hidden" name="oldimage" value="{{ $edit_slider->image }}">

                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-8">
                                            <input id="title" type="text" name="title" class="form-control" value="{{ $edit_slider->title }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-8">
                                             <textarea id="description" name="description" class="form-control" placeholder="Description" rows="5">{{ $edit_slider->description }}</textarea>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-8">
                                           <img style="height: 100px; width: 100px" src="{{ asset($edit_slider->image) }}">
                                        </div>
                                    </div>

                                    

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Slider Image</label>

                                        <div class="col-sm-8">
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Select Status</label>
                                        <div class="col-sm-8">
                                            <select name="status" class="form-control">
                                                <option {{ $edit_slider->status == "1" ? "selected" : " " }} value="1">Active</option>
                                                <option {{ $edit_slider->status == "0" ? "selected" : " " }} value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-8">
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