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
    <div class="search-result-container ">
        <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active" id="list-container">
                <div class="category-product">
                    <div class="category-product-inner wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="products">
                            <div class="product-list product">
                               <h1 style="text-decoration: overline; text-align: center; color: green;">{{ $our_service->title }}</h1>
                                <div class="row product-list-row">
                                    <!-- /.col -->
                                        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                                          <div class="blog-slider-container outer-top-xs">
                                              <div class="item">
                                                <div class="blog-post">
                                                  <div class="blog-post-image">
                                                    <div class="image"> <a href="{{ url('blog_details/'.$our_service->id) }}"><img src="{{ asset($our_service->image) }}" alt=""></a> </div>
                                                  </div>
                                                  <!-- /.blog-post-image -->
                                                  
                                                  <div class="blog-post-info text-left"><br>
                                                    <span class="info">Published Date: {{ $our_service->created_at }}</span><br><br>
                                                    <p style="text-align: justify;" class="text">{{ $our_service->description }}</p>
                                                  </div>
                                                  <!-- /.blog-post-info --> 
                                                  
                                                </div>
                                                <!-- /.blog-post -->

                                              </div>
                                              <!-- /.item -->
                                          </div>
                                          <!-- /.blog-slider-container -->


          <div class="col-xs-12 col-sm-6 no-padding social">
            <h4 style="color: green;">Our social medai Plateform</h4><br> 
              <ul class="link">
                <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
                <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
                <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
                <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
                <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
                <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
              </ul>
          </div>




                                        </section>
                                        <!-- /.section -->
                                </div>
                                <!-- /.product-list-row -->
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












