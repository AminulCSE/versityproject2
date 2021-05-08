@extends('layouts.frontapp')
@section('content')
      <div class="col-md-1"></div>
      <div class="col-xs-12 col-sm-12 col-md-10 homebanner-holder"> 
                  <div class="detail-block">
                    @php $userProfile = Auth::user(); @endphp
                    @if(Auth::check())
                      <div class="row  wow fadeInUp">
                          <div class="col-md-8 col-sm-8 create-new-account">

                          @if(session()->has('message'))
                              <div class="alert alert-success">
                                  {{ session()->get('message') }}
                              </div>
                          @endif

                          @if(session()->has('error'))
                              <div class="alert alert-warning">
                                  {{ session()->get('error') }}
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

                            <h4 class="checkout-subtitle" style="color: #05a70a; text-align: center;">আপডেট পাসওয়ার্ড</h4>

                            <form action="{{ url('user/update_password/'.Auth::user()->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="oldPass" placeholder="পুরাতন পাসওয়ার্ড প্রবেশ করুন।" class="form-control unicase-form-control text-input" id="oldPass">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="newPass" placeholder="নতুন পাসওয়ার্ড প্রবেশ করুন।" class="form-control unicase-form-control text-input" id="newPass">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="confirmPass"  placeholder="আবার নতুন পাসওয়ার্ড প্রবেশ করুন।" class="form-control unicase-form-control text-input" id="confirmPass">
                                </div>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">আপডেট</button>
                            </form>
                        </div>

                          <div class="col-md-4 col-sm-12" style="background-color: #05a70a; padding: 30px; margin: 15px 0px; height: 400px">
                              <span style="color: white;">></span><a class="btn btn-primary" href="{{ route('user.home') }}">আমার প্রফাইল</a><br><br>
                             <span style="color: white;">></span><a class="btn btn-primary" href="{{ url('user/user_edit/'.Auth::user()->id) }}">প্রফাইল পরিবর্তন</a><br><br>
                            <span style="color: white;">></span><a class="btn btn-primary" href="{{ url('user/change_userpass/'.Auth::user()->id) }}">চেন্জ পাসওয়ার্ড</a><br><br>
                            <span style="color: white;">></span><a class="btn btn-primary" href="{{ url('order_list') }}">অর্ডার</a>
                          </div>
                      </div><!-- /.row -->
                    @else
                    <h2 style="text-align: center;color: #ff4433;">অনুগ্রহ করে লগইন/ রেজিস্ট্রেশন করুন:-
                      <a style="text-align: center; text-decoration: underline;" href="{{ route('login') }}">লগ ইন/ রেজিস্ট্রেশন</a>
                    </h2>

                    @endif

                    

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












