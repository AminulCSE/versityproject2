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

                                <h5>Add Product</h5>
                                <a class="btn btn-primary float-right" href="{{ url('product/all_product') }}">All Product</a>
                            </div>

                            <div class="card-block">
                                <form action="{{ url('product/store_product') }}" method="POST" enctype='multipart/form-data'>
                                    @csrf
                                    <div class="form-group row">
                                        <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" required id="product_name" name="product_name" class="form-control" placeholder="Product Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="price" name="price" class="form-control" placeholder="Product price">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-8">
                                            <textarea id="description" required name="description" class="form-control" placeholder="Description" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="size" class="col-sm-2 col-form-label">Size</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="size" name="size" class="form-control" placeholder="Product size">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Select Category</label>
                                        <div class="col-sm-8">
                                            <select name="category_id" class="form-control">
                                                @foreach($all_cat as $all_cat_row)
                                                <option value="{{ $all_cat_row->id }}">{{ $all_cat_row->category_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Image One</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="image1" required class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Image Two</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="image2" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Image Three</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="image3" class="form-control">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-8">
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