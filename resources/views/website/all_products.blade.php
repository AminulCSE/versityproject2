@extends('layouts.frontapp')
@section('content')

<!-- Notification for success or error -->
@if(session()->has('success'))
<div class="alert alert-success text-center">
    {{ session()->get('success') }}
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger text-center">
    {{ session()->get('error') }}
</div>
@endif



<div class="body-content outer-top-xs" id="top-banner-and-menu">
<div class="container">
<div class="row"> 
<!-- ============================================== SIDEBAR ============================================== -->
<div class="col-md-9">
    <!-- ========================================== SECTION – HERO ========================================= -->
    <div class="clearfix filters-container">
        <div class="row">
            <div class="col col-sm-6 col-md-2">
                <div class="filter-tabs">
                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                        <li>
                            <a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.filter-tabs -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-12 col-md-6">
                <div class="col col-sm-3 col-md-6 no-padding">
                    <div class="lbl-cnt"><span class="lbl">Sort by</span>
                        <div class="fld inline">
                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span></button>
                                <ul role="menu" class="dropdown-menu">
                                    <li role="presentation"><a href="#">position</a></li>
                                    <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                    <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                    <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.fld -->
                    </div>
                    <!-- /.lbl-cnt -->
                </div>
                <!-- /.col -->
                <div class="col col-sm-3 col-md-6 no-padding">
                    <div class="lbl-cnt"><span class="lbl">Show</span>
                        <div class="fld inline">
                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span></button>
                                <ul role="menu" class="dropdown-menu">
                                    <li role="presentation"><a href="#">1</a></li>
                                    <li role="presentation"><a href="#">2</a></li>
                                    <li role="presentation"><a href="#">3</a></li>
                                    <li role="presentation"><a href="#">4</a></li>
                                    <li role="presentation"><a href="#">5</a></li>
                                    <li role="presentation"><a href="#">6</a></li>
                                    <li role="presentation"><a href="#">7</a></li>
                                    <li role="presentation"><a href="#">8</a></li>
                                    <li role="presentation"><a href="#">9</a></li>
                                    <li role="presentation"><a href="#">10</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.fld -->
                    </div>
                    <!-- /.lbl-cnt -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

    <div class="search-result-container ">
        <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active" id="list-container">
                <div class="category-product">
                    <div class="category-product-inner wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="products">
                            <div class="product-list product">
                            <?php if ($all_product->count()<=0) { ?>
                               <h1 style="width: 70%; color: red; text-align: center;">We can not find this category related products!!</h1>
                            <?php } ?>

                            @foreach($all_product as $all_products)
                                <div class="row product-list-row">
                                    <div class="col col-sm-4 col-lg-4">
                                        <div class="product-image">
                                            <div class="image">
                                              <img src="{{ asset($all_products->image1) }}" alt=""></div>
                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-sm-8 col-lg-8">
                                        <div class="product-info">
                                            <h3 class="name">
                                                <a href="{{ url('product_details/'.$all_products->id) }}">{{ $all_products->product_name }}</a>
                                            </h3>

                                            
                                            <div class="product-price">
                                                <span class="price"> ৳ {{ $all_products->price }} </span>
                                            </div>
                                            <!-- /.product-price -->
                                            <div class="description m-t-10">
                                              {{ Str::limit($all_products->description, 350) }}
                                            </div>

                                            <div class="cart clearfix animate-effect">
                                              <div class="action">
                                                <ul class="list-unstyled">
                                                  <li class="add-cart-button btn-group">
                                                    <a href="{{ url('product_details/'.$all_products->id) }}" type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i>এড টু কার্ট</a>
                                                  </li>
                                                  <li class="lnk wishlist"> 
                                                    <a class="" href="{{ url('add_to_wishlist/'.$all_products->id) }}" title="Wishlist"> 
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                  </li>
                                                </ul>
                                              </div>
                                              <!-- /.action --> 
                                            </div>
                                        </div>
                                        <!-- /.product-info -->
                                    </div>
                                    <!-- /.col -->
                                </div><br>
                                <!-- /.product-list-row -->
                                @endforeach
                            </div>
                            <!-- /.product-list -->
                        </div>
                        <!-- /.products -->
                    </div>
                    <!-- /.category-product-inner -->


                </div>
                <!-- /.category-product -->
            </div>
            <!-- /.tab-pane #list-container -->
            {{ $all_product->links() }}
        </div>
        <!-- /.tab-content -->
        <!-- /.filters-container -->

    </div>
    <!-- /.search-result-container -->

</div>

@include('inc.sidebar')
</div>
<!-- /.row --> 

@endsection












