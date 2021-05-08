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




                          <div class="col-md-8">
                            <h3 style="color: #05a70a; text-align: center;">অর্ডার সমূহ</h3><br><br>
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>অর্ডার নাম্বার</th>
                                  <th>মোট টাকা</th>
                                  <th>পেমেন্ট টাইপ</th>
                                  <th>স্টেটাস</th>
                                  <th>এ্যাকশন</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach($order_data as $order_row)
                                <tr>
                                  <td># {{ $order_row->order_no }}</td>
                                  <td>{{ $order_row->order_total }}</td>
                                  <td>
                                    {{ $order_row->payment_method }}
                                    @if($order_row->payment_method=='Bkash')
                                    <span>(Transaction no: {{ $order_row->transaction_no }})</span>
                                    @endif
                                  </td>
                                  <td>
                                    @if($order_row->status==0)
                                    <span class="text-danger">Order Pending</span>
                                    @elseif($order_row->status==1)
                                    <span class="text-primary">Approved</span>
                                    @endif
                                  </td>
                                  <td>
                                    <a href="{{ url('order_details/'.$order_row->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Details</a>
                                  </td>

                                  <td>
                                    <a onclick="return confirm('Are you sure the product to delete??')" href="{{ url('order_details/'.$order_row->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
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