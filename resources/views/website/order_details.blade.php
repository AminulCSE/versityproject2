@extends('layouts.frontapp')
@section('content')
      <div class="col-md-1"></div>
      <div class="col-xs-12 col-sm-12 col-md-10 homebanner-holder"> 
                  <div class="detail-block">
                      <div class="row  wow fadeInUp">
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

                          <div class="col-md-8 table-responsive">
                            <table class="table-bordered" width="100%" style="background-color: #f7f7f7;">
                              <tr>
                                <td width="30%" style="background: #023020;">
                                  <img style="height: 90px; width: auto; margin: 40px;" src="{{ asset($get_logo->image) }}"></td>
                                <td width="40%" style="padding: 10px;">
                                  <span style="font-size: 25px; text-align: center; color: #05a70a;">নগরধারা </span><br>
                                  মোবাইল নংঃ 01787377982<br>
                                  ই-মেইলঃ nagardhara@gmail.com<br>
                                  অ্যাড্রেসঃ মিরপুর-১৩, ঢাকা-১২১৬, বাংলাদেশ<br>
                                </td>
                                <td style="padding: 10px;" width="30%">অর্ডার নাম্বার</td>
                              </tr>

                              @foreach($get_order_details as $order_details)
                              <tr>
                                <td style="padding: 10px;">Billing info</td>
                                <td style="padding: 10px;" colspan="2">
                                  <strong>Name:</strong> {{ $order_details->name }}
                                  <strong>Mobile no:</strong> {{ $order_details->mobile_no }}<br>
                                  <strong>Email:</strong> {{ $order_details->email }}
                                  <strong>Address:</strong> {{ $order_details->address }}
                                  <strong>Payment Method:</strong> 
                                    {{ $order_details->payment_method }}
                                    @if($order_details->payment_method=='Bkash')
                                      <span>(Transaction no: {{ $order_details->transaction_no }})</span>
                                    @endif

                                    @php
                                      $sub_total_g = $order_details->order_total;
                                    @endphp
                                </td>
                              </tr>
                              @endforeach

                              <tr>
                                <td style="padding: 10px;">Product name/ Image</td>
                                <td style="padding: 10px;">Product size</td>
                                <td style="padding: 10px;">Product Qty/ Price</td>
                              </tr>

                              @foreach($details as $product_details_row)
                              <tr>
                                <td  style="padding: 10px;">
                                  <img style="height: 80px; width: 80px;" src="{{ asset($product_details_row->image1) }}"><br>
                                  {{ $product_details_row->product_name }}
                                </td>
                                <td style="padding: 10px;">{{ $product_details_row->size }}</td>
                                <td style="padding: 10px;">
                                  {{ $product_details_row->qty }} x
                                  {{ $product_details_row->price }}=
                                  @php
                                    $sub_total = $product_details_row->qty*$product_details_row->price;
                                    echo $sub_total.'/-';
                                  @endphp
                                </td>
                              </tr>
                              @endforeach

                              <tr>
                                <td style="padding: 10px; text-align: right;" colspan="2">Grand Total: </td>
                                <td style="padding: 10px;">={{ $sub_total_g }}/-</td>
                              </tr>
                            </table>
                          </div>

                          <div class="col-md-4 col-sm-12" style="background-color: #05a70a; padding: 30px; margin: 15px 0px; height: 400px">
                             <span style="color: white;">></span><a class="btn btn-primary" href="{{ route('user.home') }}">আমার প্রফাইল</a><br><br>
                             <span style="color: white;">></span><a class="btn btn-primary" href="{{ url('user/user_edit/'.Auth::user()->id) }}">প্রফাইল পরিবর্তন</a><br><br>
                            <span style="color: white;">></span><a class="btn btn-primary" href="{{ url('user/change_userpass/'.Auth::user()->id) }}">চেন্জ পাসওয়ার্ড</a><br><br>
                            <span style="color: white;">></span><a class="btn btn-primary" href="{{ url('order_list') }}">অর্ডার</a>
                          </div>
                      </div><!-- /.row -->
                  </div>


                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                  

                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <div class="col-md-1"></div>
@endsection












