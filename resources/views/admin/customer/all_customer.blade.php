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
                            <h5>All Customer</h5>
                            <a class="btn btn-primary float-right" href="{{ url('customer/all_draft_customer') }}">Draft Customer</a>
                            
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Signup Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($allCustomer as $customer_row)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $customer_row->name }}</td>
                                            <td>{{ $customer_row->email }}</td>
                                            <td>{{ $customer_row->mobile }}</td>

                                            <td>
                                                <img src="{{ asset($customer_row->image) }}" style="height: 85px; width: auto;">
                                            </td>
                                            <td>

                                                @if($customer_row->status == 1) 
                                                <div class="label-main">
                                                    <label class="label label-success">Active</label>
                                                </div>
                                                @else
                                                <div class="label-main">
                                                    <label class="label label-danger">Draft</label>
                                                </div>
                                                @endif

                                            </td>

                                            <td>
                                                @php
                                                    $created = new Carbon\Carbon($customer_row->created_at);
                                                    $now = Carbon\Carbon::now();
                                                    $diff = ($created->diff($now)->days <1 )?'Today':$created->diffForHumans($now);
                                                @endphp
                                                {{ $diff }}
                                            </td>


                                            <td>

                                                <a href="{{ url('product/edit_product/'.$customer_row->id) }}" title="Edit">
                                                    <i style="font-size: 22px;" class="ti ti-pencil-alt"></i>
                                                </a>
                                                
                                                <a href="{{ url('customer/draft_customer/'.$customer_row->id) }}" title="Draft" onclick="return confirm('Are you sure to delete Slider?')">
                                                    <i style="font-size: 22px;margin-left: 10px;" class="ti ti-na"></i>
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