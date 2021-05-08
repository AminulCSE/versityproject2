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
                            <h5>All Pending Orders</h5>
                            <a class="btn btn-primary float-right" href="{{ url('orders/approved_orders') }}">Approved Orders</a>
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
                                            <th>Customer name</th>
                                            <th>Order no</th>
                                            <th>Total Tk</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp


                                        @foreach($pending_orders as $pending_row)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $pending_row->name }}</td>
                                            <td>{{ $pending_row->order_no }}</td>
                                            <td>{{ $pending_row->amount }}</td>

                                            <td>
                                                @if($pending_row->status=='Pending')
                                            <span class="text-danger">Pending</span>
                                                @elseif($pending_row->status=='Processing')
                                            <span class="text-primary">Processing</span>
                                                @else
                                            <span class="text-primary">Approved</span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ url('orders/pending_orders_details/'.$pending_row->id) }}" title="Draft">
                                                    <i style="font-size: 22px;margin-left: 10px;" class="ti ti-eye"></i>
                                                </a>

                                                <a href="{{ url('orders/delete_order/'.$pending_row->id) }}" title="Delete">
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