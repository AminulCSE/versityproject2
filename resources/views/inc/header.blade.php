<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="ফলের চারা, ফুলের চারা ,সবজি চারা, মসলা চারা, অন্যান্য">
<meta name="author" content="">
<meta name="keywords" content="নগরধারা">
<meta name="robots" content="all">
<title>নগরধারা</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('public/frontend/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap-select.min.css') }}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('public/frontend/css/font-awesome.css') }}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1"> 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            
            <li>
              @if(Auth::check())
              <a href="{{ url('view_wishlist/'.Auth::user()->id) }}">
                <i class="icon fa fa-heart"></i>উইস লিস্ট</a>
              @else
              <a href="">
                <i class="icon fa fa-heart"></i>উইস লিস্ট---খালি</a>
              @endif


              @if(Auth::check())
              @php
                $wishlist = DB::table('wishlists')
                        ->where('user_id', Auth::user()->id)
                        ->get();
              @endphp
              <span class="menu-label new-menu hidden-xs" style="color: green; font-size: 18px; background-color: pink; border-radius: 5px;">{{ count($wishlist) }}</span>
              @endif
            </li>
            <li><a href="{{ url('showcart') }}"><i class="icon fa fa-shopping-cart"></i>কার্ট</a></li>

            
            <!-- <li>
              @if(@Auth::user()->id != NULL && Session::get('shipping_id') == NULL)
              <a href="{{ url('checkout/order_checkout') }}">
                <i class="icon fa fa-check"></i>চেকআউট
              </a>
              
              @elseif(@Auth::user()->id != NULL && Session::get('shipping_id') != NULL )
              <a href="{{ url('customer/payment') }}">
                <i class="icon fa fa-check"></i>চেকআউট
              </a>

              @else
              <a href="{{ route('login') }}">
                <i class="icon fa fa-check"></i>চেকআউট
              </a>
              @endif
            </li> -->


            @if(@Auth::check())
            <li>
              <a href="{{ route('user.home') }}">
                <img src="{{ (!empty(Auth::user()->image))?url(Auth::user()->image):url('public/frontend/images/noimage.jpg') }}" style="height: 20px; width: 25px; border-radius: 50%;">
                  @php echo Auth::user()->name;@endphp
              </a>
            </li>

            <li>
              <a href="{{ url('order_list') }}">
                <i class="icon fa fa-shopping-cart"></i>অর্ডার
              </a>
            </li>

            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="icon fa fa-lock"></i>লগ আউট
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
            @else
            <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>লগ ইন</a></li>
            @endif
          </ul>
        </div>
        <!-- /.cnt-account -->


        <!-- /.cnt-cart -->
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 logo-holder"> 
          <!-- ============================================================= LOGO ============================================================= -->
          @php
            $get_logo = DB::table('logos')->where('status', 1)->first();
          @endphp
          <div class="logo">
            <a href="{{ url('/') }}">
            <img style="width: 184px;
    height: 69px;
    left: 5px;
    bottom: -55px;
    position: absolute;" src="{{ asset($get_logo->image) }}" alt="logo"> </a>
          </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area">
            <form action="{{ url('product_search') }}" method="get" role="search">
              <div class="control-group">
                <input class="search-field" name="product_slug" placeholder="প্রোডাক্ট সার্চ করুন..." />
                <button type="submit" class="search-button"></button>
              </div>
            </form>
          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= -->
        </div>
        <!-- /.top-search-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                    @php
                      $cart_row = Cart::content();
                      $total = 0;
                      $qty = 0;
                    @endphp

                            @foreach($cart_row as $cartval_row)
                              @php $total += $cartval_row->subtotal;  @endphp
                              @php $qty += $cartval_row->qty;         @endphp
                            @endforeach
          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count">{{ $qty }}</span></div>
              <div class="total-price-basket"> <span class="lbl">কার্ট -</span> <span class="total-price"> <span class="sign">৳ </span><span class="value">{{ $total }}</span> </span> </div>
            </div>
            </a>


            <ul class="dropdown-menu">
              <li>
                <div class="cart-item product-summary">

                @php
                   $cart_for_cartopt = Cart::content();
                   $total = 0;
                @endphp


                @foreach($cart_for_cartopt as $cartval_row)
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="#"><img src="{{ asset($cartval_row->options->image1) }}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name">
                        <a href="{{ url('product_details/'.$cartval_row->id) }}">
                          {{ $cartval_row->name }}
                        </a>
                        <h4 style="color: red;">{{ $cartval_row->qty }} পিছ</h4>
                      </h3>
                      <div class="price">{{ $cartval_row->subtotal }}</div>
                    </div>
                    <div class="col-xs-1 action">
                      <a href="{{ url('destroycart/'.$cartval_row->rowId) }}">
                        <i class="fa fa-trash"></i>
                      </a>
                    </div>
                  </div>

                @php $total += $cartval_row->subtotal;  @endphp
                @endforeach

                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>
                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">সাব টোটাল :</span><span class='price'>{{ $total }}</span> </div>
                  <div class="clearfix"></div>
                
                  @if(@Auth::user()->id != NULL && Session::get('shipping_id') == NULL)
                  <a href="{{ url('checkout/order_checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">
                    <i class="icon fa fa-check"></i>চেকআউট
                  </a>

                  @elseif(@Auth::user()->id != NULL && Cart::count() == null)
                  <a href="{{ url('/') }}" style="background-color: red;" class="btn btn-upper btn-primary btn-block m-t-20">
                    <i class="icon fa fa-check"></i>আপনার কার্টে প্রডাক্ট নেই।
                  </a>
                  
                  @elseif(@Auth::user()->id != NULL && Session::get('shipping_id') != NULL )
                  <a href="{{ url('customer/payment') }}" class="btn btn-upper btn-primary btn-block m-t-20">
                    <i class="icon fa fa-check"></i>চেকআউট
                  </a>

                  @else
                  <a href="{{ route('login') }}" class="btn btn-upper btn-primary btn-block m-t-20">
                    <i class="icon fa fa-check"></i>চেকআউট
                  </a>
                  @endif
              </div>
              <!-- /.cart-total--> 








              </li>

            </ul>
            <!-- /.dropdown-menu-->
          </div>

          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
        </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>








  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">

                <li class="dropdown {{ request()->is('/') ? 'active':'' }}"> <a href="{{ url('/') }}">হোম</a>
                </li>

                <li class="dropdown hidden-sm {{ request()->is('all_products') ? 'active':'' }}"> <a href="{{ url('all_products') }}"> সকল প্রোডাক্ট </a>
                </li>

                <!--  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">বাগানের ধরন <div class="fa fa-sort-desc"></div></a>
                  <ul class="dropdown-menu pages">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <div class="col-xs-12 col-menu">
                            <ul class="links">
                              <li><a href="#">ভূমিতে</a></li>
                              <li><a href="#">ছাদে</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li> -->

                <li class="dropdown hidden-sm {{ request()->is('show_ourservice') ? 'active':'' }}"> <a href="{{ url('show_ourservice') }}">আমাদের সম্পর্কে</a> </li>

                <li class="dropdown hidden-sm {{ request()->is('user/contact_us') ? 'active':'' }}"> <a href="{{ url('user/contact_us') }}">যোগাযোগ করুন</a> </li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>






