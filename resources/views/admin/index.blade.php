@extends('layouts.backapp')
@section('backend_content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <!-- task, page, download counter  start -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-yellow update-card">
                                <div class="card-block">
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            @php
                                                $all_products = DB::table('products')->where('status', 1)->count();
                                            @endphp
                                            <h4 class="text-white">{{ $all_products }} Products</h4>

                                            <h6 class="text-white m-b-0">All Products</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <canvas id="update-chart-1" height="50"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>
                                        @php
                                            $get_last_date = DB::table('products')->where('status', 1)->orderBy('id', 'DESC')->first();
                                        @endphp
                                       Last inserted:  {{ $get_last_date->created_at }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-green update-card">
                                <div class="card-block">
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            @php
                                                $all_orders = DB::table('orders')->count();
                                            @endphp
                                            <h4 class="text-white">{{ $all_orders }} Orders</h4>
                                            <h6 class="text-white m-b-0">All orders</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <canvas id="update-chart-2" height="50"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="text-white m-b-0">
                                        <i class="feather icon-clock text-white f-14 m-r-10"></i>
                                        @php
                                            $get_last_date_order = DB::table('orders')->orderBy('id', 'DESC')->first();
                                        @endphp

                                        @if($get_last_date_order!=null)
                                            Last inserted:  {{ $get_last_date_order->created_at }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-pink update-card">
                                <div class="card-block">
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            @php
                                                $all_completed_orders = DB::table('orders')->where('status', 1)->count();
                                            @endphp
                                            <h4 class="text-white">{{ $all_completed_orders }} Cmplt</h4>
                                            <h6 class="text-white m-b-0">Orders Completed</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <canvas id="update-chart-3" height="50"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>
                                        @php
                                            $get_last_date_order_complt = DB::table('orders')->where('status', 1)->orderBy('id', 'DESC')->first();
                                        @endphp
                                        @if($get_last_date_order_complt)
                                       Last inserted:  {{ $get_last_date_order_complt->created_at }}
                                       @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-lite-green update-card">
                                <div class="card-block">
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            @php
                                                $total_earning_amount = 0;
                                                $total_earning = DB::table('orders')->where('status', 1)->get();
                                            @endphp

                                            @foreach($total_earning as $total_earn_row)
                                                @php $total_earning_amount += $total_earn_row->order_total; @endphp
                                             @endforeach
                                            <h4 class="text-white">
                                                {{ $total_earning_amount }}
                                            </h4>
                                           
                                            <h6 class="text-white m-b-0">Complted Total Earning</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <canvas id="update-chart-4" height="50"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>
                                        @php
                                            $get_last_date_order_complt_earning = DB::table('orders')->where('status', 1)->orderBy('id', 'DESC')->first();
                                        @endphp
                                         @if($get_last_date_order_complt_earning)
                                       Last inserted:  {{ $get_last_date_order_complt_earning->created_at }}
                                       @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- task, page, download counter  end -->

                        <div class="col-xl-12 col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Products</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i></li>
                                            <li><i class="feather icon-trash-2 close-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                <table id="new-cons" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Price</th>
                                                    <th>Size</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            @php
                                $get_pro = DB::table('products')->where('status',1)->get();
                            @endphp

                            @foreach($get_pro as $get_pro_row)
                                                <tr>
                                                    <td>{{ $get_pro_row->product_name }}</td>
                                                    <td>{{ $get_pro_row->price }}</td>

                                                    <td class="text-c-blue">{{ $get_pro_row->size }}</td>

                                                    <td class="text-c-blue">
                                                        <img style="height: 80px; width: 80px;" src="{{ asset($get_pro_row->image1) }}">
                                                    </td>


                                                    <td class="text-c-blue">
                                                        <a href="{{ url('product/edit_product/'.$get_pro_row->id) }}">
                                                            <i style="font-size: 22px;" class="ti ti-pencil-alt"></i>
                                                        </a>

                                                        <a onclick="return confirm('Are you sure to delete the product??')" href="{{ url('product/delete_product/'.$get_pro_row->id) }}">
                                                            <i style="font-size: 22px;" class="ti ti-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="text-center">
                                            <a href="#!" class=" b-b-primary text-primary">View all Projects</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                        <!-- social download  end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
