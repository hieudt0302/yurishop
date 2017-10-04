

@extends('layouts.master')
@section('title','Cà phê Đak Hà - Trang chủ')
@section('content')

           <!-- Fullwidth Slider -->
            <div class="home-section fullwidth-slider bg-dark">
                
                <!-- Slide Item -->
                <section class="page-section bg-scroll bg-dark bg-dark-alfa-50" style="background-image:url('{{ asset('public/assets/rhythm/images/foods/trungthu.jpg') }}');">
                    <div class="relative container">
                        
                        <!-- Hero Content -->
                        <div class="home-content">
                            <div class="home-text">
                                
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <h1 class="hs-line-6 no-transp font-alt">Quăng đi gánh lo mâm cỗ trung thu <a href="shop-columns-2col.html" class="btn btn-mod btn-w btn-round" style="margin-top:-3px;">@lang('common.see-more')</a></h1>   
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- End Hero Content -->
                        
                    </div>
                </section>
                <!-- End Slide Item -->
                
                <!-- Slide Item -->
                <section class="page-section bg-scroll bg-dark bg-dark-alfa-50" style="background-image:url('{{ asset('public/assets/rhythm/images/foods/caphe.jpg') }}');">
                    <div class="relative container">
                        
                        <!-- Hero Content -->
                        <div class="home-content">
                            <div class="home-text">
                                
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">

                                        <h1 class="hs-line-6 no-transp font-alt">Cà phê "thuần cà phê"" <a href="shop-columns-2col.html" class="btn btn-mod btn-w btn-round" style="margin-top:-3px;">Shop Now</a></h1>
                                            
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- End Hero Content -->
                        
                    </div>
                </section>
                <!-- End Slide Item -->
                
                <!-- Slide Item -->
                <section class="page-section bg-scroll bg-dark bg-dark-alfa-50" style="background-image:url('{{ asset('public/assets/rhythm/images/foods/keomut.jpg') }}');">
                    <div class="relative container">
                        
                        <!-- Hero Content -->
                        <div class="home-content">
                            <div class="home-text">
                                
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">

                                        <h1 class="hs-line-6 no-transp font-alt">Đặc sản 3 miền <a href="shop-columns-2col.html" class="btn btn-mod btn-w btn-round" style="margin-top:-3px;">Shop Now</a></h1>
                                            
                                   </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- End Hero Content -->
                        
                    </div>
                </section>
                <!-- End Slide Item -->
            
            </div>
            <!-- End Fullwidth Slider -->    
            
            <!-- Section -->
            <section class="page-section">
                <div class="container relative">
                    
                    <h2 class="section-title font-alt mb-70 mb-sm-40">
                        @lang('home.new-products')
                    </h2>
                    
                    <div class="row multi-columns-row">
                        @foreach($new_products as $product)
                        <!-- Shop Item -->
                        <div class="col-md-3 col-lg-3 mb-40">
                            
                            <div class="post-prev-img">
                                
                                <a href="shop-single.html"><img src="{{ asset('public/assets/img/product/' . $product->thumb) }}" alt="" /></a>
                                
                                @if($product->is_promote == 1)
                                <div class="intro-label">
                                    <span class="label label-danger bg-red">@lang('product.sale')</span>
                                </div>
                                @endif 
                                
                            </div>
                            
                            <div class="post-prev-title font-alt align-center">
                                <a href="shop-single.html">{{ $product->name }}</a>
                            </div>
    
                            <div class="post-prev-text align-center mb-0">
                                @if($product->is_promote == 1)
                                <del>{!! price_format($product->default_price,'VNĐ') !!}</del>
                                &nbsp;
                                <strong>{!! price_format($product->promote_price,'VNĐ') !!}</strong>
                                @else
                                <strong>{!! price_format($product->default_price,'VNĐ') !!}</strong>
                                @endif                                
                            </div>
                              
                        </div>
                        <!-- End Shop Item -->
                        @endforeach
                        
                    </div>
                    
                    <div class="mt-20 align-center">
                        <a href="" class="btn btn-mod btn-round btn-medium">@lang('common.see-more')</a>
                    </div>
                
                </div>
            </section>
            <!-- End Section -->
            
            
            <!-- Section -->
            <section class="page-section bg-gray-lighter">
                <div class="container relative">
                    
                    <h2 class="section-title font-alt mb-70 mb-sm-40">
                        Bạn đang tìm đặc sản hấp dẫn nhất của từng miền?
                    </h2>
                    
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="section-text align-center mb-70 mb-xs-40">
                                Tố tụng tìm luật sư, tìm kiếm lên Google, trời mưa mang ô dù, cần đặn sản "chất" của 3 miền thì đến với chúng tôi.
                                Không có một cơ hỏi nhỏ nhoi cho lựa chọn sai. Mở quà ra là bạn bè biết bạn đi đâu, đưa vào miệng là bạn bè bạn cảm nhận dạt dào vùng đất bạn đã đến.
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        
                        <!-- Item -->
                        <div class="col-sm-4 mb-20 wow fadeIn" data-wow-delay="0.1s" data-wow-duration="2s">
                            
                            <div class="post-prev-img">
                                <a href="#"><img src="{{ asset('public/assets/rhythm/images/foods/mienbac.jpg')}}" alt="" /></a>
                            </div>
                            
                        </div>
                        <!-- End Item -->
                        
                        <!-- Item -->
                        <div class="col-sm-4 mb-20 wow fadeIn" data-wow-delay="0.2s" data-wow-duration="2s">
                            
                            <div class="post-prev-img">
                                <a href="#"><img src="{{ asset('public/assets/rhythm/images/foods/mientrung.jpg')}}" alt="" /></a>
                            </div>
                            
                        </div>
                        <!-- End Item -->
                        
                        <!-- Item -->
                        <div class="col-sm-4 mb-20 wow fadeIn" data-wow-delay="0.3s" data-wow-duration="2s">
                            
                            <div class="post-prev-img">
                                <a href="#"><img src="{{ asset('public/assets/rhythm/images/foods/miennam.jpg')}}" alt="" /></a>
                            </div>
                            
                        </div>
                        <!-- End Item -->
                        
                    </div>
                    
                </div>
            </section>
            <!-- End Section -->
            
            
            <!-- Section -->
            <section class="page-section">
                <div class="container relative">
                    
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tpl-tabs animate">
                        <li class="active">
                            <a href="#one" data-toggle="tab">Trendness</a>
                        </li>
                        <li>
                            <a href="#two" data-toggle="tab">Bestsellers</a>
                        </li>
                        <li>
                            <a href="#three" data-toggle="tab">Featured</a>
                        </li>
                    </ul>
                    <!-- End Nav tabs -->
                    
                    <!-- Tab panes -->
                    <div class="tab-content tpl-tabs-cont section-text">
                        <div class="tab-pane fade in active" id="one">
                            
                            <div class="row">
                                
                                <div class="col-sm-4">
                                    
                                    <ul class="clearlist widget-posts">
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-1.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Polo Shirt With Argyle Print</a>
                                                <div>
                                                    <del>
                                                        50.00
                                                    </del>&nbsp;
                                                    $25.99
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-2.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Polo Slim Fit Pique Badge Logo</a>
                                                <div>
                                                    $75.00
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                    </ul>
                                    
                                </div>
                                
                                <div class="col-sm-4">
                                    
                                    <ul class="clearlist widget-posts">
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-3.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Esprit Pique Polo Shirt</a>
                                                <div>
                                                    $30.99
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-4.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Polo Shirt With Argyle Print</a>
                                                <div>
                                                    $15.99
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                    </ul>
                                    
                                </div>
                                
                                <div class="col-sm-4">
                                    
                                    <ul class="clearlist widget-posts">
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-2.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Polo Slim Fit Pique Badge Logo</a>
                                                <div>
                                                    $75.00
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-5.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Polo Shirt With Argyle Print</a>
                                                <div>
                                                    $15.99
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                    </ul>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="tab-pane fade" id="two">
                        
                            <div class="row">
                            
                                <div class="col-sm-4">
                                    
                                    <ul class="clearlist widget-posts">
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-2.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Polo Slim Fit Pique Badge Logo</a>
                                                <div>
                                                    $75.00
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-5.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Polo Shirt With Argyle Print</a>
                                                <div>
                                                    $15.99
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                    </ul>
                                    
                                </div>
                                
                                <div class="col-sm-4">
                                    
                                    <ul class="clearlist widget-posts">
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-1.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Polo Shirt With Argyle Print</a>
                                                <div>
                                                    <del>
                                                        50.00
                                                    </del>&nbsp;
                                                    $25.99
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-2.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Polo Slim Fit Pique Badge Logo</a>
                                                <div>
                                                    $75.00
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                    </ul>
                                    
                                </div>
                                
                                <div class="col-sm-4">
                                    
                                    <ul class="clearlist widget-posts">
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-3.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Esprit Pique Polo Shirt</a>
                                                <div>
                                                    $30.99
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-4.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Polo Shirt With Argyle Print</a>
                                                <div>
                                                    $15.99
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                    </ul>
                                    
                                </div>
                                
                           </div>
                        
                        </div>
                        
                        <div class="tab-pane fade" id="three">
                        
                            <div class="row">
                                
                                <div class="col-sm-4">
                                    
                                    <ul class="clearlist widget-posts">
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-1.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Polo Shirt With Argyle Print</a>
                                                <div>
                                                    <del>
                                                        50.00
                                                    </del>&nbsp;
                                                    $25.99
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-2.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Polo Slim Fit Pique Badge Logo</a>
                                                <div>
                                                    $75.00
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                    </ul>
                                    
                                </div>
                                
                                
                                <div class="col-sm-4">
                                    
                                    <ul class="clearlist widget-posts">
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-2.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Polo Slim Fit Pique Badge Logo</a>
                                                <div>
                                                    $75.00
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-5.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Polo Shirt With Argyle Print</a>
                                                <div>
                                                    $15.99
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                    </ul>
                                    
                                </div>
                                
                                <div class="col-sm-4">
                                    
                                    <ul class="clearlist widget-posts">
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-3.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Esprit Pique Polo Shirt</a>
                                                <div>
                                                    $30.99
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                        <!-- Preview item -->
                                        <li class="clearfix">
                                            <a href=""><img src="{{ asset('public/assets/rhythm/images/shop/previews/shop-prev-4.jpg')}}" alt="" class="widget-posts-img" /></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Polo Shirt With Argyle Print</a>
                                                <div>
                                                    $15.99
                                                </div>
                                                <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Preview item -->
                                        
                                    </ul>
                                    
                                </div>
                                
                            </div>
                        
                        </div>
                    </div>
                    <!-- End Tab panes -->
                    
                </div>
            </section>
            <!-- End Section -->
            
            <!-- Divider -->
            <hr class="mt-0 mb-0 "/>
            <!-- End Divider -->
            
            
            <!-- Section -->
            <section class="page-section">
                <div class="container relative">
                    
                    <!-- Features Grid -->
                    <div class="row alt-features-grid">
                        
                        <!-- Text Item -->
                        <div class="col-sm-3">
                            <div class="alt-features-item align-center">
                                <div class="alt-features-descr align-left">
                                    <h4 class="mt-0 font-alt">Phương châm của chúng tôi?</h4>
                                    Hoạt động trong lĩnh vực thực phẩm nhiều năm,
                                    chúng tôi luôn theo đuổi triêt lý chiều chuộng vị giác khách hàng. 
                                    Chỉ cần bạn bước 1 bước về phía chúng tôi, 999 bước còn lại chúng tôi sẽ bước.
                                </div>
                            </div>
                        </div>
                        <!-- End Text Item -->
                        
                        <!-- Features Item -->
                        <div class="col-sm-3">
                            <div class="alt-features-item align-center">
                                <div class="alt-features-icon">
                                    <span class="icon-chat"></span>
                                </div>
                                <h3 class="alt-features-title font-alt">Hỗ trợ 24/7</h3>
                                <p>Luôn luôn lắng nghe.</p>
                            </div>
                        </div>
                        <!-- End Features Item -->
                        
                        <!-- Features Item -->
                        <div class="col-sm-3">
                            <div class="alt-features-item align-center">
                                <div class="alt-features-icon">
                                    <span class="icon-wallet"></span>
                                </div>
                                <h3 class="alt-features-title font-alt">100% hoàn tiền</h3>
                                <p>Nếu bạn thấy chất lượng không như chúng tôi giới thiệu.</p>
                            </div>
                        </div>
                        <!-- End Features Item -->
                        
                        <!-- Features Item -->
                        <div class="col-sm-3">
                            <div class="alt-features-item align-center">
                                <div class="alt-features-icon">
                                    <span class="icon-hotairballoon"></span>
                                </div>
                                <h3 class="alt-features-title font-alt">Ship hàng toàn quốc</h3>
                                <p>Đem cả 3 miền về ngôi nhà bạn.</p>
                            </div>
                        </div>
                        <!-- End Features Item -->
                        
                   </div>
                   <!-- End Features Grid -->
                    
                </div>
            </section>
            <!-- End Section --> 
@endsection
