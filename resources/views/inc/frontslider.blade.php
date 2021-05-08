
        <!-- ========================================== SECTION – HERO ========================================= -->
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

            @php
              $slider = DB::table('sliders')->where('status','1')->get();
            @endphp


            @foreach($slider as $slider_row)
            <div class="item" style="background-image: url({{ asset($slider_row->image) }});">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="big-text fadeInDown-1" style="color: white;"> {{ $slider_row->title }} </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span style="color: white;"> {{ $slider_row->description }} </span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">এখনই কিনুন</a> </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            @endforeach
            <!-- /.item -->
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        
        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">বিশ্বস্ততা</h4>
                    </div>
                  </div>
                  <h6 class="text">আপনাদের অভিরুচি </h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">এগিয়ে চলা</h4>
                    </div>
                  </div>
                  <h6 class="text">আমাদের প্রচেষ্ঠায়</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">সবুজের জন্য</h4>
                    </div>
                  </div>
                  <h6 class="text">নাগরিক চাহিদা নিয়ে "নগরধারা"</h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>