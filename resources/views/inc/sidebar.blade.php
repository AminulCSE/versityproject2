<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>ক্যাটাগরী</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">

              <!---Its for category -->
              @php
                $category = DB::table('categories')
                          ->where('status', '1')
                          ->orderBy('id', 'ASC')
                          ->get();
              @endphp
                @foreach($category as $cat_row)


                <!---Its for subcategory -->
                @php
                  $subcategory = DB::table('sub_categories')
                            ->where('status', '1')
                            ->where('category_id', $cat_row->id)
                            ->get();
                @endphp

              <li class="dropdown menu-item"> 
                <a href="{{ url('show_product_by_category/'.$cat_row->id) }}" class="dropdown-toggle @if($subcategory->count() != NULL) subcat @endif" @if($subcategory->count() != NULL) data-toggle="dropdown" @endif>
                  <i class="icon fa fa-envira" style="color: #05a70a" aria-hidden="true"></i>
                  {{ $cat_row->category_name  }}
                </a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">

                    
                  @foreach($subcategory as $sub_cat_row)

                    <div class="row">
                      <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li>
                            <a href="{{ url('show_product_by_category/'.$cat_row->id.'/'.$sub_cat_row->id) }}">{{ $sub_cat_row->sub_category_name }}</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    @endforeach
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> 
              </li>
@endforeach
              <!-- /.menu-item -->
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
      
        
        <!-- ============================================== SPECIAL OFFER ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">হট ডিল</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
              <div class="item">
                <div class="products special-product">

              @php
                $get_hot_deal = DB::table('products')->where('status',1)->limit(4)->inRandomOrder()->get();
              @endphp

              @foreach($get_hot_deal as $get_hot_deal_row)
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset($get_hot_deal_row->image1) }}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="{{ url('product_details/'.$get_hot_deal_row->id) }}">{{ $get_hot_deal_row->product_name }}</a></h3>
                            <div class="product-price"> <span class="price">Tk {{ $get_hot_deal_row->price }}</span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                  </div>

                  @endforeach

                </div>
              </div>
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL OFFER : END ============================================== -->
        
        <!-- ============================================== Testimonials============================================== -->
        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
          <div id="advertisement" class="advertisement">
            <div class="item">
              <div class="avatar"><img src="{{ asset('public/frontend/images/testimonials/member1.png') }}" alt="Image"></div>
              <div class="testimonials">
                <h4>Help center</h4>
                <p>Name: Aminul islam peal</p>
                <p>Phone: 01787377982</p>
                <p>Email: pealrana63@gmail.com</p>
              </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item -->
            
            <div class="item">
              <div class="avatar"><img src="{{ asset('public/frontend/images/testimonials/member3.png') }}" alt="Image"></div>
              <div class="testimonials">
                <h4>Help center</h4>
                <p>Name: Aminul islam peal</p>
                <p>Phone: 01787377982</p>
                <p>Email: pealrana63@gmail.com</p>
              </div>
            </div>
            <!-- /.item -->
            
            <div class="item">
              <div class="avatar"><img src="{{ asset('public/frontend/images/testimonials/member2.png') }}" alt="Image"></div>
              <div class="testimonials">
                <h4>Help center</h4>
                <p>Name: Aminul islam peal</p>
                <p>Phone: 01787377982</p>
                <p>Email: pealrana63@gmail.com</p>
              </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item --> 
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        <!-- ============================================== Testimonials: END ============================================== -->
      </div>
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->