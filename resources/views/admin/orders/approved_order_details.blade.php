@extends('layouts.backapp')
@section('backend_content')
 <div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                    <!-- Page body start -->
                    <div class="page-body">
                        <!-- Container-fluid starts -->
                        <div class="container">
                            <!-- Main content starts -->
                            <div>
                                <!-- Invoice card start -->
                                <div class="card">
                                    <div class="card-block">
                                <div class="col-md-4">
                                    @if(session()->has('message'))
                                    <div class="alert alert-primary">
                                        {{ session()->get('message') }}
                                    </div>
                                    @endif
                                </div>
                                        <div class="row invoive-info">
                                            <div class="col-md-4 col-xs-12 invoice-client-info">
                                                <h6>Client Information :</h6><hr>
                                                <h6 class="m-0">Name: {{ $get_approved_order->name }}</h6>
                                                <p class="m-0">Email: {{ $get_approved_order->email }}</p>
                                                <p class="m-0">Mobile: {{ $get_approved_order->mobile }}</p>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <h6>Order Information :</h6><hr>
                                                <table class="table table-responsive invoice-table invoice-order table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th>Date :</th>
                                                            <td>{{ $get_approved_order->created_at }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Order no :</th>
                                                            <td>
                                                                {{ $get_approved_order->order_no }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Transaction no :</th>
                                                            <td>
                                                                {{ $get_approved_order->transaction_id }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <h6 class="">Shipping info <span></span></h6><hr>

                                                <table class="table table-responsive invoice-table invoice-order table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th>Name :</th>
                                                            <td>{{ $get_approved_order->name }}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Email :</th>
                                                            <td>
                                                                {{ $get_approved_order->email }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>Mobile :</th>
                                                            <td>
                                                                {{ $get_approved_order->mobile }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>Address :</th>
                                                            <td>
                                                                {{ $get_approved_order->address }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                        <div class="row">
                        <!-- Approved or not approved status -->
                                            @if($get_approved_order->status == 'verified')
                                            <h2 class="text-success text-center">Order Status Approved</h2>
                                            @else
                                            <h2 class="text-danger text-center">Order Status Unapprovied</h2>
                                            @endif
                                        </div><br>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="table  invoice-detail-table">
                                                        <thead>
                                                            <tr class="thead-default">
                                                                <th>Description</th>
                                                                <th>Quantity</th>
                                                                <th>Size</th>
                                                                <th>Amount</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $total=0; @endphp
                                                        @foreach($approved_order_details as $details_row)
                                                            <tr>
                                                                <td>
                                                                    <h6>{{ $details_row->product_name }}</h6>
                                                                    <p>
                                                                        {{ Str::limit($details_row->description, 70) }}
                                                                    </p>
                                                                </td>
                                                                <td>{{ $details_row->qty }}</td>
                                                                <td>{{ $details_row->size }}</td>
                                                                <td>{{ $details_row->price }}</td>
                                                                <td>{{ $details_row->price*$details_row->qty }}</td>
                                                                @php $total += $details_row->price*$details_row->qty; @endphp
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-responsive invoice-table invoice-total">
                                                    <tbody>
                                                        <tr>
                                                            <th>Sub Total :</th>
                                                            <td>Tk: {{ $total }}/-</td>
                                                        </tr>
                                                        <tr class="text-info">
                                                            <td>
                                                                <hr>
                                                                <h5 class="text-primary">Total :</h5>
                                                            </td>
                                                            <td>
                                                                <hr>
                                                                <h5 class="text-primary">Tk: {{ $total }}/-</h5>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Invoice card end -->
                                <div class="row text-center">
                                    <div class="col-sm-12 invoice-btn-group text-center">
                                        @if($get_approved_order->status == 0)
                                        <a href="{{ url('orders/approved_orders_status/'.$get_approved_order->order_no) }}" class="btn btn-success waves-effect m-b-10 btn-sm waves-light">Do Approve status</a>
                                        @else
                                        <a href="{{ url('orders/unapproved_orders/'.$get_approved_order->order_no) }}" class="btn btn-danger waves-effect m-b-10 btn-sm waves-light">Do UnApprove status</a>
                                        @endif


                                        <a href="{{ url('orders/approved_orders') }}" class="btn btn-danger waves-effect m-b-10 btn-sm waves-light">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Container ends -->
                    </div>
                    <!-- Page body end -->
                </div>
            </div>
            <!-- Warning Section Starts -->
        </div>
    </div>
</div>
@endsection