@extends('layouts.frontapp')
@section('content')
      <div class="col-md-1"></div>
      <div class="col-xs-12 col-sm-12 col-md-10 homebanner-holder"> 
                  <div class="detail-block">
                    @php $userProfile = Auth::user(); @endphp
                    @if(Auth::check())
                      <div class="row  wow fadeInUp">
                        <div class="col-md-3"></div>
                          <div class="col-md-6 col-sm-6 create-new-account">
                            
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




                            <h4 class="checkout-subtitle" style="color: #05a70a; text-align: center;">সিপিং এড্রেস</h4>
                            <form action="{{ url('checkout/store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="name">নাম: <span>*</span></label>
                                    <input type="text" name="name" required=""class="form-control unicase-form-control text-input" id="name">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="email">ইমেইল: <span>*</span></label>
                                    <input type="email" name="email" class="form-control unicase-form-control text-input" id="email">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="mobile_no">মোবাইল নং</label>
                                    <input type="text" name="mobile_no" required="" class="form-control unicase-form-control text-input" id="mobile_no">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="address">অ্যড্রেস</label>
                                    <textarea rows="4" required="" name="address" class="form-control unicase-form-control text-input"></textarea>
                                </div>

                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">চেকআউট</button>
                            </form>
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












