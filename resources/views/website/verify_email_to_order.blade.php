@extends('layouts.frontapp')
@section('content')
<div class="col-md-2"></div>
<div class="col-xs-12 col-sm-12 col-md-8 homebanner-holder"> 
    <div class="detail-block">
        <div class="row wow fadeInUp">

            <div class="col-md-2"></div>
            <div class="col-md-8 col-sm-8 create-new-account">
               @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif

                @if(session()->has('error'))
                <div class="alert alert-danger">
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
              <style type="text/css">
                .info-title>span{color: red;}
              </style>

              <h4 class="checkout-subtitle" style="color: #05a70a; text-align: center;">আপনার শিপিং ইমেইলে পাঠানো কোডটি এখানে দেন।</h4>
              <form action="{{ url('order/verify_code') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                      <label class="info-title" for="verify_code">ভেরিফাই কোড: <span>*</span></label>
                      <input type="number" name="verify_code" placeholder="ভেরিফাই কোড" class="form-control border border-success" id="verify_code">
                  </div>
                  <button type="submit" class="btn-upper btn btn-primary checkout-page-button">ভেরিফাই</button>
              </form>
          </div>
		<div class="col-md-2"></div>
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
<div class="col-md-2"></div>
@endsection