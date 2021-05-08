@extends('layouts.frontapp')
@section('content')
  <div class="col-md-1"></div>
  <div class="col-xs-12 col-sm-12 col-md-10 homebanner-holder"> 
              <div class="detail-block">
                  <div class="row fadeInUp">
                    <h3 style="text-align: center; color: red;">আপনার শিপিং এ্যাড্রেস এবং পেমেন্টের সঠিক তথ্য প্রধান করুন
                      <br><i class="fa fa-chevron-down"></i>
                    </h3>

                    <div class="row ">
                      <div class="shopping-cart">
                        <div class="shopping-cart-table">
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
                        <div class="table-responsive">
                          <table class="table col-xs-12 col-sm-12">
                            <thead>
                              <tr>
                                <th class="cart-description item">Image</th>
                                <th class="cart-product-name item">Product Name</th>
                                <th class="cart-qty item">Quantity</th>
                                <th class="cart-price item">Price</th>
                                <th class="cart-size item">Size</th>
                                <th class="cart-sub-total item">Subtotal</th>
                                <th class="cart-romove item">Remove</th>
                              </tr>
                            </thead><!-- /thead -->
                            <tbody>

                    @php
                      $cart_row = Cart::content();
                      $total = 0;
                    @endphp

                            @foreach($cart_row as $cartval_row)
                              <tr>
                                <td class="cart-image">
                                  <a class="entry-thumbnail" href="{{ url('product_details/'.$cartval_row->id) }}">
                                      <img src="{{ asset($cartval_row->options->image1) }}" alt="">
                                  </a>
                                </td>

                                <td class="cart-product-name-info">
                                  <h4 class="cart-product-description"><a href="{{ url('product_details/'.$cartval_row->id) }}">{{ $cartval_row->name }}</a></h4>
                                  
                                  <div class="cart-product-info">
                                    <span class="product-color">Product Code:<span>{{ $cartval_row->options->product_code }}</span></span>
                                  </div>
                                </td>

                                  <form action="{{ url('updatecart') }}" method="post">
                                    @csrf
                                    <td class="cart-product-quantity">
                                      <div class="quant-input">
                                        <input type="number" name="qty" value="{{ $cartval_row->qty }}" min="1">
                                        <input type="hidden" name="rowId" value="{{ $cartval_row->rowId }}">
                                      </div>
                                          <input type="submit" name="submit" value="Update">
                                    </td>
                                  </form>

                              <td>
                                  <div class="cart-product-info">
                                    {{ $cartval_row->price }}
                                  </div>
                              </td>

                              <td>
                                  <div class="cart-product-info">
                                    {{ $cartval_row->options->size }}
                                  </div>
                              </td>

                                <td class="cart-product-sub-total">
                                  <span class="cart-sub-total-price">{{ $cartval_row->subtotal }}</span>
                                </td>

                                <!--<td class="cart-product-grand-total"><span class="cart-grand-total-price">{{ $cartval_row->subtotal*$cartval_row->qty }}</span></td>
                                 -->
                                 <td class="romove-item">
                                 <a onclick="return confirm('Are you sure to delete the cart??')" href="{{ url('destroycart/'.$cartval_row->rowId) }}" title="cancel" class="icon">
                                    <i class="fa fa-trash-o"></i>
                                  </a>
                                </td>
                              </tr>
                              @php $total += $cartval_row->subtotal;  @endphp
                              @endforeach

                              <td colspan="4" style="text-align: right;"> <b>Grand Total</b> </td>
                              <td colspan="2"><b>Tk:- {{ $total }}/-</b></td>

                            </tbody><!-- /tbody -->
                          </table><!-- /table -->
                        </div>
                      </div><!-- /.shopping-cart-table -->  
                    </div><!-- /.shopping-cart -->
                  </div>

                  <div class="row" style=""><!-- Payment methed -->
                    <div class="col-md-4"></div>

                    <div class="col-md-4">
                      <h3 style="text-align: center; color: red;">Payment Method</h3>
                      <form action="{{ url('customer/payment/store') }}" method="post">
                        @csrf

                        @foreach($cart_row as $cartval_row)
                          <input type="hidden" name="product_id" value="{{ $cartval_row->id }}">
                        @endforeach


                        <input type="hidden" name="order_total" value="{{ $total }}">
                        <select class="form-control" name="payment_method" required="" id="payment_method">
                          <option selected="" disabled="">Select Payment Type</option>
                          <option value="Hand cash">Hand Cash</option>

                          <option onclick="showhide()" value="Bkash">Bkash</option>
                          <option onclick="showhide()" value="Nagad">Nagad</option>
                        </select>

                        <!-- id="show_field" -->
                        <div style="/*display: none;*/ margin-top: 20px;">
                          <span style="color: green;">* Bkash/Nagad Transaction No: 01787377982</span><br>
                          <input type="text" name="transaction_no"  class="form-control" placeholder="Enter Bkash Transction id">
                        </div><br>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">সাবমিট</button>
                      </form>
                    </div>
                    <div class="col-md-4"></div>
                  </div>
                </div><!-- /.row -->



      <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
      </style>








      @php
        $cart_row = Cart::content();
        $total = 0;
        $qty = 0;
      @endphp

      @foreach($cart_row as $cartval_row)
        @php $total += $cartval_row->subtotal;  @endphp
        @php $qty += $cartval_row->qty;         @endphp
      @endforeach
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">আপনার কার্টে</span>
                <span class="badge badge-secondary badge-pill">{{ $qty }}</span>
            </h4>

            <ul class="list-group mb-3">
              @foreach($cart_row as $cartval_row)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <img style="height: 80px; width: auto;" src="{{ asset($cartval_row->options->image1) }}">
                        <h6 class="my-0">প্রোডাক্টের নাম</h6>
                        <small class="text-muted">
                          {{ $cartval_row->name }}<br>

                          <span class="product-color">কোড:
                            <span>
                              {{ $cartval_row->options->product_code }}
                            </span>
                          </span><br>

                          <span>কোয়ানটিটি: {{ $qty }}</span>
                        </small>
                    </div>
                    <span class="text-muted">TK {{ $cartval_row->price }}</span>
                </li>
                @endforeach

                    


                <li class="list-group-item d-flex justify-content-between">
                    <span>টোটাল (BDT)</span>
                    <strong>{{ $total }} TK</strong>
                    <div class="cart-product-info">
                  </div>
                </li>
            </ul>
        </div>



        <div class="col-md-8 order-md-1" style="line-height: 30px;">
            <h4 class="mb-3">বিলের তথ্য</h4>
            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">আপনার পুরো নাম</label>
                        <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="আপনার নাম দেন....." required>
                        <div class="invalid-feedback">
                            কাস্টমারের নাম বধ্যতামূলক
                        </div>
                    </div>
                </div>



                @php
                  $cart_row = Cart::content();
                  @endphp
                @foreach($cart_row as $cartval_row)
                  <input type="hidden" name="product_id" value="{{ $cartval_row->id }}">
                @endforeach




                <div class="mb-3">
                    <label for="mobile">মোবাইল</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+88</span>
                        </div>
                        <input type="text" name="customer_mobile" class="form-control" id="mobile" placeholder="Mobile" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            মোবাইল নাম্বার বধ্যতামূলক
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">ইমেইল</label>
                    <input type="email" required="" name="customer_email" class="form-control" id="email"
                           placeholder="you@example.com">
                    <div class="invalid-feedback">
                        শিপিং আপডেট এর জন্য দয়াকরে সঠিক ই-মেইল এড্রেস প্রধান করুন
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">এ্যাড্রেস</label>
                    <input type="text" class="form-control" id="address"
                           placeholder="93 B, New Eskaton Road" required name="address">
                    <div class="invalid-feedback">
                        দয়াকরে সঠিক শিপিং এ্যাড্রেস প্রধান করুন
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label for="state">শহর</label>
                        <select class="custom-select d-block w-100 form-control" name="state" id="state" required>
                            <option selected="">আপনার শহর নির্বাচিন করুন...</option>
                            <option value="Dhaka">ঢাকা</option>
                            <option value="Norsingdi">নরসিংদী</option>
                            <option value="Gazipur">গাজীপুর</option>
                            <option value="Shariotpur">শরীয়তপুর</option>
                            <option value="Naraonganj">নারায়ণগঞ্জ</option>
                            <option value="Tangail">টাঙ্গাইল</option>
                            <option value="Kishoreganj">কিশোরগঞ্জ</option>
                            <option value="Manikganj">মানিকগঞ্জ</option>
                            <option value="Munshiganj">মুন্সিগঞ্জ</option>
                            <option value="Rajbari">রাজবাড়ী</option>
                            <option value="Madaripur">মাদারীপুর</option>
                            <option value="Gupalganj">গোপালগঞ্জ</option>
                            <option value="Faridpur">ফরিদপুর</option>

                            <option value="Panchghor">পঞ্চগড়</option>
                            <option value="Dinajpur">দিনাজপুর</option>
                            <option value="Lalmonirhat">লালমনিরহাট</option>
                            <option value="Nillfamari">নীলফামারী</option>
                            <option value="Gaubanda">গাইবান্ধা</option>
                            <option value="Takurgau">ঠাকুরগাঁও</option>
                            <option value="Rangpur">রংপুর</option>
                            <option value="Kurigram">কুড়িগ্রাম</option>

                            <option value="Sherpur">শেরপুর</option>
                            <option value="Mymensingh">ময়মনসিংহ</option>
                            <option value="Jamalpur">জামালপুর</option>
                            <option value="Netrokona">নেত্রকোণা</option>

                            <option value="Syleth">সিলেট</option>
                            <option value="Molobibazar">মৌলভীবাজার</option>
                            <option value="Habiganj">হবিগঞ্জ</option>
                            <option value="Shunamganj">সুনামগঞ্জ</option>

                            <option value="Jalokhati">ঝালকাঠি</option>
                            <option value="Potuakhali">পটুয়াখালী</option>
                            <option value="Firozpur">পিরোজপুর</option>
                            <option value="Barishal">বরিশাল</option>
                            <option value="Bhula">ভোলা</option>
                            <option value="Barguna">বরগুনা</option>

                            <option value="Jashor">যশোর</option>
                            <option value="Shatkhira">সাতক্ষীরা</option>
                            <option value="Meharpur">মেহেরপুর</option>
                            <option value="Norail">নড়াইল</option>
                            <option value="Chudnga">চুয়াডাঙ্গা</option>
                            <option value="Kustia">কুষ্টিয়া</option>
                            <option value="Magura">মাগুরা</option>
                            <option value="Khulna">খুলনা</option>
                            <option value="Bagerhat">বাগেরহাট</option>
                            <option value="Jinaydha">ঝিনাইদহ</option>

                            <option value="Shirajganj">সিরাজগঞ্জ</option>
                            <option value="Pabna">পাবনা</option>
                            <option value="Bogura">বগুড়া</option>
                            <option value="Rajshahi">রাজশাহী</option>
                            <option value="Nator">নাটোর</option>
                            <option value="Jaypurhat">জয়পুরহাট</option>
                            <option value="Chapaynobabganj">চাঁপাইনবাবগঞ্জ</option>
                            <option value="Nowga">নওগাঁ</option>


                            <option value="Comilla">কুমিল্লা</option>
                            <option value="Feni">ফেনী</option>
                            <option value="Bramonbaria">ব্রাহ্মণবাড়িয়া</option>
                            <option value="Rangamati">রাঙ্গামাটি</option>
                            <option value="Nowkhali">নোয়াখালী</option>
                            <option value="Chadpur">চাঁদপুর</option>
                            <option value="Lakkipur">লক্ষ্মীপুর</option>
                            <option value="Chattagram">চট্টগ্রাম</option>
                            <option value="Co-xbazar">কক্সবাজার</option>
                            <option value="Kagrachori">খাগড়াছড়ি</option>
                            <option value="Bandarban">বান্দরবান</option>
                        </select>
                        <div class="invalid-feedback">
                            আপনার সঠিক স্ট্যাট নির্বাচন করুন
                        </div>





                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">জিপ</label>
                        <input type="text" class="form-control" name="zip" id="zip" placeholder="" required>
                        <div class="invalid-feedback">
                            জিপ কোড বাধ্যতামূলক
                        </div>
                    </div>
                </div>

                <input type="hidden" value="{{ $total }}" name="amount" id="total_amount"/>
{{ $total }}


                <button class="btn btn-primary btn-lg btn-block" type="submit">হোস্ট পে (Hosted)</button>
            </form>
        </div>
    </div>






















              </div>
            </div><!-- /.col -->
            <div class="clearfix">
              
            </div>
        </div><!-- /.row -->
      </div>
  <!-- /.homebanner-holder --> 
  <!-- ============================================== CONTENT : END ============================================== --> 
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<!-- /.row --> 
<div class="col-md-1"></div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<!-- If you want to use the popup integration, -->
<script>
    var obj = {};
    obj.cus_name = $('#customer_name').val();
    obj.cus_phone = $('#mobile').val();
    obj.cus_email = $('#email').val();
    obj.cus_addr1 = $('#address').val();
    obj.amount = $('#total_amount').val();

    $('#sslczPayBtn').prop('postdata', obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>

@endsection