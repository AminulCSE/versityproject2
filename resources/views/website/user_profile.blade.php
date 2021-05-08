@extends('layouts.frontapp')
@section('content')
      <div class="col-md-1"></div>
      <div class="col-xs-12 col-sm-12 col-md-10 homebanner-holder"> 
                  <div class="detail-block">
                    @php $userProfile = Auth::user(); @endphp
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
                            <img style="height: 240px; width: 240px;" src="{{ asset($userProfile->image) }}">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>নাম</th>
                                  <th>ইমেইল</th>
                                  <th>মোবাইল নাম্বার</th>
                                  <th>রেজিস্ট্রেশন ডেট</th>
                                </tr>
                              </thead>

                              <tbody>
                                <tr>
                                  <td>{{ $userProfile->name }}</td>
                                  <td>{{ $userProfile->email }}</td>
                                  <td>{{ $userProfile->mobile }}</td>
                                  <td>{{ $userProfile->created_at }}</td>
                                </tr>
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












