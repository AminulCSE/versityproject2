<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Customer Order Invoice
    	<?php date('d:M:Y') ?>
    </title>
  </head>
  <body>


<div class="page-wrapper" style="padding: 44px;">
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
                                                <h6>Customer Information :</h6><hr>
                                                <h6 class="m-0">Name: {{ $get_approved_order_print->name }}</h6>
                                                <p class="m-0">Email: {{ $get_approved_order_print->email }}</p>
                                                <p class="m-0">Mobile: {{ $get_approved_order_print->mobile }}</p>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <h6>Order Information :</h6><hr>
                                                <table class="table table-responsive invoice-table invoice-order table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th>Date :</th>
                                                            <td>{{ $get_approved_order_print->created_at }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Order no :</th>
                                                            <td>
                                                                {{ $get_approved_order_print->order_no }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Payment Method :</th>
                                                            <td>
                                                                {{ $get_approved_order_print->payment_method }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Transaction no :</th>
                                                            <td>
                                                                {{ $get_approved_order_print->transaction_no }}
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
                                                            <td>{{ $get_approved_order_print->name }}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th>Email :</th>
                                                            <td>
                                                                {{ $get_approved_order_print->email }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>Mobile :</th>
                                                            <td>
                                                                {{ $get_approved_order_print->mobile_no }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>Address :</th>
                                                            <td>
                                                                {{ $get_approved_order_print->address }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                        <div class="row">
                        <!-- Approved or not approved status -->
                                            @if($get_approved_order_print->status == 0)
                                            <h2 style="color: red; margin:auto">Order Status UnApproved</h2>
                                            @else
                                            <h2 style="color: green; margin:auto">Order Status Approved</h2>
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
                                </div><br>
                                <!-- Invoice card end -->
                                <div class="row text-center">
                                    <div class="col-sm-12 invoice-btn-group text-center">
                                        <a href="{{ url('orders/approved_orders') }}" class="btn btn-danger waves-effect m-b-10 btn-sm waves-light">Back</a>

                                        <a onclick="window.print()" class="btn btn-danger waves-effect m-b-10 btn-sm waves-light"><i class="fa fa-print fa-1x"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Container ends -->
                    </div>
                    <!-- Page body end -->
                </div>















    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    
  </body>
</html>