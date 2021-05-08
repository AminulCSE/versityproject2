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
                    <div class="card">
                        <div class="card-header">
                            <h5>All Product</h5>
                            <a class="btn btn-primary float-right" href="{{ url('product/add_product') }}">Add Product</a>
                            
                        </div>

                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table id="new-cons" class="table table-striped table-bordered nowrap">
                                    <div class="col-md-5">
                                        @if(session()->has('message'))
                                            <div class="alert alert-success">
                                                {{ session()->get('message') }}
                                            </div>
                                        @endif
                                    </div>
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Product Name</th>
                                            <th>Product Code</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Size</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($all_product as $product_row)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $product_row->product_name }}</td>
                                            <td>{{ $product_row->product_code }}</td>
                                            <td>{{ $product_row->category_name }}</td>
                                            <td>{{ $product_row->price }}</td>
                                            <td>{{ $product_row->description }}</td>
                                            <td>{{ $product_row->size }}</td>
                                            
                                            <td>
                                                <img src="{{ asset($product_row->image1) }}" style="height: 85px; width: auto;">
                                            </td>
                                            <td>

                                                @if($product_row->status == 1) 
                                                <div class="label-main">
                                                    <label class="label label-success">Active</label>
                                                </div>
                                                @else
                                                <div class="label-main">
                                                    <label class="label label-danger">Inactive</label>
                                                </div>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{ url('product/edit_product/'.$product_row->id) }}">
                                                    <i style="font-size: 22px;" class="ti ti-pencil-alt"></i>
                                                </a>
                                                <a href="">
                                                    <i style="font-size: 22px;margin-left: 10px;" class="ti ti-eye"></i>
                                                </a>
                                                <a onclick="return confirm('Are you sure to delete Slider?')" href="{{ url('product/delete_product/'.$product_row->id) }}">
                                                    <i style="font-size: 22px;margin-left: 10px;" class="ti ti-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Config. table end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection