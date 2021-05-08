@extends('layouts.frontapp')
@section('content')


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
      <div class="col-md-1"></div>
      <div class="col-xs-12 col-sm-12 col-md-10 homebanner-holder"> 
                  <div class="detail-block">
                      <div class="row  wow fadeInUp">
                          <div class="col-xs-12 col-sm-8 col-md-5 gallery-holder">
                              <div class="product-item-holder size-big single-product-gallery small-gallery">

                                  <div id="owl-single-product">
                                      <div class="single-product-gallery-item" id="slide1">
                                          <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($product_details->image1) }}">
                                              <img class="img-responsive" alt="" src="{{ asset($product_details->image1) }}" data-echo="{{ asset($product_details->image1) }}"/>
                                          </a>
                                      </div><!-- /.single-product-gallery-item -->

                                      <div class="single-product-gallery-item" id="slide2">
                                          <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($product_details->image2) }}">
                                              <img class="img-responsive" alt="" src="{{ asset($product_details->image2) }}" data-echo="{{ asset($product_details->image2) }}"/>
                                          </a>
                                      </div><!-- /.single-product-gallery-item -->

                                      <div class="single-product-gallery-item" id="slide3">
                                          <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($product_details->image3) }}">
                                              <img class="img-responsive" alt="" src="{{ asset($product_details->image3) }}" data-echo="{{ asset($product_details->image3) }}"/>
                                          </a>
                                      </div><!-- /.single-product-gallery-item -->

                                  </div><!-- /.single-product-slider -->


                                  <div class="single-product-gallery-thumbs gallery-thumbs">
                                    <br>
                                      <div id="owl-single-product-thumbnails">
                                          <div class="item">
                                              <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                                                  <img class="img-responsive" width="85" alt="" src="{{ asset($product_details->image1) }}" data-echo="{{ asset($product_details->image1) }}"/>
                                              </a>
                                          </div>

                                          <div class="item">
                                              <a class="horizontal-thumb" data-target="#slide2" data-slide="1" href="#slide2">
                                                  <img class="img-responsive" width="85" alt="" src="{{ asset($product_details->image2) }}" data-echo="{{ asset($product_details->image2) }}"/>
                                              </a>
                                          </div>     


                                          <div class="item">
                                              <a class="horizontal-thumb" data-target="#slide3" data-slide="1" href="#slide3">
                                                  <img class="img-responsive" width="85" alt="" src="{{ asset($product_details->image3) }}" data-echo="{{ asset($product_details->image3) }}"/>
                                              </a>
                                          </div>     

                                      </div><!-- /#owl-single-product-thumbnails -->
                                  </div><!-- /.gallery-thumbs -->
                              </div><!-- /.single-product-gallery -->
                          </div><!-- /.gallery-holder -->



                          <div class='col-sm-4 col-md-7 product-info-block'>
                              <div class="product-info">
                                <form action="{{ url('add_to_cart/'.$product_details->id) }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <input type="hidden" name="product_name" value="{{ $product_details->product_name }}">

                                  <input type="hidden" name="id" value="{{ $product_details->id }}">
                                  <input type="hidden" name="size" value="{{ $product_details->size }}">

                                  <input type="hidden" name="price" value="{{ $product_details->price }}">

                                  <input type="hidden" name="image1" value="{{ $product_details->image1 }}">
                                  
                                  <input type="hidden" name="product_code" value="{{ $product_details->product_code }}">

                                  <h1 class="name">{{ $product_details->product_name }}</h1>
                                  <div class="stock-container info-container m-t-10">
                                      <div class="row">
                                          <div class="col-sm-9">
                                              <div class="stock-box">
                                                  <span style="color: red;" class="value">* স্টকে আছে</span>
                                              </div>
                                          </div>
                                      </div><!-- /.row -->
                                  </div><!-- /.stock-container -->

                                  <div class="description-container m-t-20">
                                    {{ Str::limit($product_details->description, 500) }}
                                  </div><!-- /.description-container -->

                                  <div class="description-container m-t-20">
                                      <p class="size" style="font-weight: bold;">{{ $product_details->size }}</p>
                                  </div>

                                  <div class="description-container m-t-20">
                                      <p class="price">৳{{ $product_details->price }}</p>
                                  </div>

                                  <div class="quantity-container info-container">
                                      <div class="row">
                                          <div class="col-sm-3">
                                            <input type="number" name="qty" min="1" value="1" class="form-control">
                                          </div>
                                          <div class="col-sm-9">
                                              <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i>এড টু কার্ট</button>

                                                  <li class="add-cart-button btn-group">
                                                    <a href="{{ url('add_to_wishlist/'.$product_details->id) }}" class="btn btn-primary icon" type="button"><i class="icon fa fa-heart"></i>
                                                    </a>
                                                  </li>
                                          </div>
                                      </div><!-- /.row -->
                                  </div><!-- /.quantity-container -->
                                </form>
                              </div><!-- /.product-info -->
                          </div><!-- /.col-sm-7 -->
                      </div><!-- /.row -->
                  </div>


                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">রিলেটেড প্রডাক্ট</h3>
                        <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                    @php
                        $all_product = DB::table('products')->where('category_id',$product_details->category_id)->get();
                    @endphp
                    @foreach($all_product as $product_row)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                    <div class="product-image">
                                      <div class="image">
                                        <a href="{{ url('product_details/'.$product_row->id) }}">
                                          <img  src="{{ asset($product_row->image1) }}" alt="">
                                        </a>
                                      </div>
                                      <!-- /.image -->
                                    </div>
                                    <!-- /.product-image -->
                                    
                                    <div class="product-info text-left">
                                      <h2 class="name">
                                        <a href="{{ url('product_details/'.$product_row->id) }}">{{ $product_row->product_name }}</a>
                                      </h2>
                                      <div class="product-price">
                                        <p>৳{{ $product_row->price }}</p>
                                      </div>
                                      <!-- /.product-price --> 
                                      <div class="description">
                                        {{ Str::limit($product_row->description, 50) }}
                                      </div>
                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                      <div class="action">
                                        <ul class="list-unstyled">
                                          <li class="add-cart-button btn-group">
                                            <a href="{{ url('product_details/'.$product_row->id) }}" class="btn btn-primary icon" type="button">
                                              <i class="fa fa-shopping-cart"></i>
                                            </a>
                                          </li>
                                          <li class="lnk wishlist"> <a class="add-to-cart" href="{{ url('add_to_wishlist/'.$product_row->id) }}" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                        </ul>
                                      </div>
                                      <!-- /.action --> 
                                    </div>
                                    <!-- /.cart --> 
                                  </div>
                                </div><!-- /.products -->
                            </div><!-- /.item -->
                            @endforeach
                          </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

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












