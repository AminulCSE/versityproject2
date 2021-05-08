@extends('layouts.frontapp')
@section('content')
  <div class="col-md-1"></div>
  <div class="col-xs-12 col-sm-12 col-md-10 homebanner-holder"> 
              <div class="detail-block">
                  <div class="row fadeInUp">
                    <div class="row ">
                      <div class="shopping-cart">
                        <div class="shopping-cart-table">
                            @if(session()->has('success'))
                                <div class="alert alert-success" style="text-align: center;">
                                    {{ session()->get('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger" style="text-align: center;">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <div class="table-responsive">
                          <table class="table col-xs-12 col-sm-12">
                            <thead>
                              <tr>
                                <th class="cart-description item">Image</th>
                                <th class="cart-product-name item">Product Name</th>
                                <th class="cart-price item">Add to cart</th>
                                <th class="cart-price item">Price</th>
                                <th class="cart-price item">Size</th>
                                <th class="cart-romove item">Remove</th>
                              </tr>
                            </thead><!-- /thead -->
                            <tfoot>
                              <tr>
                                <td colspan="7">
                                  <div class="shopping-cart-btn">
                                    <span class="">
                                      <a href="{{ url('/') }}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                    </span>
                                  </div><!-- /.shopping-cart-btn -->
                                </td>
                              </tr>
                            </tfoot>
                            <tbody>

                            @foreach($get_wishlist as $show_wishlist_row)
                            <tr>
                              <td class="cart-image">
                                <a class="entry-thumbnail" href="{{ url('product_details/'.$show_wishlist_row->id) }}">
                                    <img src="{{ asset($show_wishlist_row->image1) }}" alt="">
                                </a>
                              </td>

                              

                              <td class="cart-product-name-info">
                                <h4 class="cart-product-description"><a href="{{ url('product_details/'.$show_wishlist_row->id) }}">{{ $show_wishlist_row->product_name }}</a></h4>
                                
                                <div class="cart-product-info">
                                  <span class="product-color">Product Code:<span>{{ $show_wishlist_row->product_code }}</span></span>
                                </div>
                              </td>

                              <td class="cart-product-name-info">
                                <a class="btn btn-primary" href="{{ url('product_details/'.$show_wishlist_row->id) }}">Add to cart</a>
                              </td>

                              <td>
                                  <div class="cart-product-info">
                                    {{ $show_wishlist_row->price }}
                                  </div>
                              </td>

                              <td>
                                  <div class="cart-product-info">
                                    {{ $show_wishlist_row->size }}
                                  </div>
                              </td>

                                 <td class="romove-item">
                                 <a onclick="return confirm('Are you sure to delete the cart??')" href="{{ url('delete_wishlist/'.$show_wishlist_row->id) }}" title="cancel" class="icon">
                                    <i class="fa fa-trash-o"></i>
                                  </a>

                                </td>
                              </tr>
                              @endforeach
                            </tbody><!-- /tbody -->
                          </table><!-- /table -->
                        </div>
                      </div><hr><!-- /.shopping-cart-table -->        
                    </div><!-- /.shopping-cart -->
                  </div>
                </div><!-- /.row -->
              </div>
            </div><!-- /.col -->
            <div class="clearfix">
              
            </div>
        </div><!-- /.row -->
      </div>
  <!-- /.homebanner-holder --> 
  <!-- ============================================== CONTENT : END ============================================== --> 
</div>
<!-- /.row --> 
<div class="col-md-1"></div>
@endsection