@extends('layouts.frontapp')
@section('content')
<div class="body-content outer-top-xs" id="top-banner-and-menu">
<div class="container">
<div class="row"> 
<!-- ============================================== SIDEBAR ============================================== -->
<div class="col-md-9">
    <div class="blog-post wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
      @foreach($blogshow_id as $blowDetails)
          <img style="height: 400px; width: auto;" class="img-responsive" src="{{ asset($blowDetails->image) }}" alt="">
          <h1>{{ $blowDetails->title }}</h1>
          <i class="fa fa-user"></i> <span class="author">{{ $blowDetails->name }}</span>
          <i class="fa fa-comment"></i> <span class="review">7 Comments</span>
          <i class="fa fa-calendar"></i> <span class="date-time">{{ $blowDetails->created_at }}</span>
          <p>{{ $blowDetails->description }}</p>
          <div class="social-media" style="font-size: 20px; color:#05a70a;">
              <span>Share post:</span>
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-linkedin"></i></a>
              <a href="#"><i class="fa fa-rss"></i></a>
              <a href="#" class="hidden-xs"><i class="fa fa-pinterest"></i></a>
          </div>
        @endforeach
      </div>
      <br><br><br>


      <div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://nagar-dhara.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>

      <div class="blog-review wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">

      <div class="related_blog">
        <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">আরো ব্লগ পোস্ট</h3>
                        <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                    @php
                        $more_blog = DB::table('blogs')->limit('5')->get();
                    @endphp
                    @foreach($more_blog as $more_blog_row)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                    <div class="product-image">
                                      <div class="image">
                                        <a href="{{ url('blog_details/'.$more_blog_row->id) }}">
                                          <img  src="{{ asset($more_blog_row->image) }}" alt="">
                                        </a>
                                      </div>
                                      <!-- /.image -->
                                    </div>
                                    <!-- /.product-image -->
                                    
                                    <div class="product-info text-left">
                                      <h2 class="name">
                                        <a href="{{ url('blog_details/'.$more_blog_row->id) }}">{{ $more_blog_row->title }}</a>
                                      </h2>
                                      <!-- /.product-price --> 
                                      <div class="description">
                                        {{ Str::limit($more_blog_row->description, 50) }}
                                      </div>
                                    </div>
                                    <!-- /.product-info -->
                                    <!-- /.cart --> 
                                  </div>
                                </div><!-- /.products -->
                            </div><!-- /.item -->
                            @endforeach
                          </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
      </div>


      </div>
  </div>
@include('inc.sidebar')
</div>
<!-- /.row --> 

@endsection












