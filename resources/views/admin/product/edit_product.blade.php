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
                                <form action="{{ url('product/update_product/'.$edit_product->id) }}" method="POST" enctype='multipart/form-data'>
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Product Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="product_name" class="form-control" value="{{ $edit_product->product_name }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Product Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="product_code" class="form-control" value="{{ $edit_product->product_code }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="price" class="form-control" value="{{ $edit_product->price }}">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Select Category</label>
                                        <div class="col-sm-8">
                                            <select name="category_id" class="form-control">
                                                @foreach($all_category as $all_cat_row)
                                                <option
                                                @if($edit_product->category_id == $all_cat_row->id) selected="" @endif
                                                value="{{ $all_cat_row->id }}">

                                                {{ $all_cat_row->category_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-8">
                                            <textarea name="description" rows="5" cols="5" class="form-control" placeholder="Default textarea">{{ $edit_product->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Size</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="size" class="form-control" value="{{ $edit_product->size }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Product Image1</label>
                                        <div class="col-sm-8">
                                            <img src="{{ asset($edit_product->image1) }}" style="height: 70px; width: auto;">
                                            <input type="file" name="image1" class="form-control">


                                            <input type="hidden" name="old_img1" value="{{ $edit_product->image1 }}">
                                            <input type="hidden" name="old_img2" value="{{ $edit_product->image2 }}">
                                            <input type="hidden" name="old_img3" value="{{ $edit_product->image3 }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Product Image2</label>
                                        <div class="col-sm-8">
                                            <img src="{{ asset($edit_product->image2) }}" style="height: 70px; width: auto;">
                                            <input type="file" name="image2" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Product Image3</label>
                                        <div class="col-sm-8">
                                            <img src="{{ asset($edit_product->image3) }}" style="height: 70px; width: auto;">
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