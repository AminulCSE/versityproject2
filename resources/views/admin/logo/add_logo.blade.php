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

                                <h5>Add Logo</h5>
                                <a class="btn btn-primary float-right" href="{{ url('logo/all_logo') }}">All Logo</a>
                            </div>

                            <div class="card-block">
                                <form action="{{ url('logo/store_logo') }}" method="POST" enctype='multipart/form-data'>
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Image</label>
                                        <div class="col-sm-7">
                                            <small style="color: red; font-size: 13px;">* height: 250px; width: 847.5px</small>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-7">
                                            <button type="submit" class="btn btn-primary">Insert</button>
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