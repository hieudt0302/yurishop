@extends('layouts.master')
@section('title','Dakmark Foods - Home')
@section('header')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection
@section('content')

<!-- Fullwidth Slider -->
<div class="home-section fullwidth-slider bg-dark">
    @foreach ($sliders as $slider)
    <!-- Slide Item -->
    <section class="page-section bg-scroll bg-dark bg-dark-alfa-50" style="background-image:url('{{ asset('images/slider/'.$slider->image) }}');">
        <div class="relative container">

            <!-- Hero Content -->
            <div class="home-content">
                <div class="home-text">

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="hs-line-6 no-transp font-alt">{{$slider->translation->description}}
                                <a href="{{url('/menu')}}/{{$slider->url}}" class="btn btn-mod btn-w btn-round" style="margin-top:-3px;">@lang('common.more-details')</a>
                            </h1>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Hero Content -->

        </div>
    </section>
    <!-- End Slide Item -->
    @endforeach
</div>
<!-- End Fullwidth Slider -->

<!-- New Product Section -->
<section class="page-section">
    <div class="container relative">

        <h2 class="section-title font-alt mb-70 mb-sm-40">
            @lang('home.new-products')
        </h2>
        <!-- Product Content -->
            <div class="col-sm-12">
            <div class="row multi-columns-row">
                 <!-- Shop Item -->
                @foreach($new_products as $product)
                <div class="col-md-3 col-lg-3 mb-60 mb-xs-40">
                    <div class="post-prev-img">
                        <a href="{{url('/products')}}/{{$product->id}}"><img class="product-main-img" src="images/shop/shop-prev-1.jpg" alt="" /></a>
                        <div class="intro-label">
                            <span class="label label-danger bg-red">Sale</span>
                        </div>
                    </div>
                    <div class="post-prev-title font-alt align-center">
                        <a href="{{url('/products')}}/{{$product->id}}">{{$product->name}}</a>
                    </div>

                    <div class="post-prev-text align-center">
                        @if(!empty($product->special_price_start_date) && $product->special_price_start_date  <= $product->special_price_end_date )
                            <del class="section-text">{{$product->price}}</del> &nbsp;
                            <strong>{{$product->special_price}}</strong>
                        @else
                            @if($product->old_price > 0)
                            <del class="section-text">{{$product->old_price}}</del> &nbsp;
                            @endif
                            <strong>{{$product->price}}</strong>
                        @endif
                    </div>
                    
                    <div class="post-prev-more align-center">
                        <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                        <input type="hidden" id="product_name" name="product_name" value="{{$product->name}}">
                        <input type="hidden" id="product_price" name="product_price" value="{{$product->price}}">
                        <button class="btn btn-mod btn-gray btn-round add-shoopingcart"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                    </div>
                    
                </div>
                @endforeach
                <!-- End Shop Item -->

            </div>
        </div>

        <div class="mt-20 align-center">
            <a href="" class="btn btn-mod btn-round btn-medium">@lang('common.see-more')</a>
        </div>

    </div>
</section>
<!-- New Product  End Section -->

<!-- Best Sellers Product Section -->
<section class="page-section">
    <div class="container relative">

        <h2 class="section-title font-alt mb-70 mb-sm-40">
            @lang('home.best-sellers-products')
        </h2>

        <!-- Product Content -->
        <div class="col-sm-12">
            <div class="row multi-columns-row">
                 <!-- Shop Item -->
                @foreach($new_products as $product)
                <div class="col-md-3 col-lg-3 mb-60 mb-xs-40">
                    <div class="post-prev-img">
                        <a href="{{url('/products')}}/{{$product->id}}"><img class="product-main-img" src="images/shop/shop-prev-1.jpg" alt="" /></a>
                        <div class="intro-label">
                            <span class="label label-danger bg-red">Sale</span>
                        </div>
                    </div>
                    <div class="post-prev-title font-alt align-center">
                        <a href="{{url('/products')}}/{{$product->id}}">{{$product->name}}</a>
                    </div>

                    <div class="post-prev-text align-center">
                        @if(!empty($product->special_price_start_date) && $product->special_price_start_date  <= $product->special_price_end_date )
                            <del class="section-text">{{$product->price}}</del> &nbsp;
                            <strong>{{$product->special_price}}</strong>
                        @else
                            @if($product->old_price > 0)
                            <del class="section-text">{{$product->old_price}}</del> &nbsp;
                            @endif
                            <strong>{{$product->price}}</strong>
                        @endif
                    </div>
                    
                    <div class="post-prev-more align-center">
                        <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                        <input type="hidden" id="product_name" name="product_name" value="{{$product->name}}">
                        <input type="hidden" id="product_price" name="product_price" value="{{$product->price}}">
                        <button class="btn btn-mod btn-gray btn-round add-shoopingcart"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                    </div>
                    
                </div>
                @endforeach
                <!-- End Shop Item -->

            </div>
        </div>

        <div class="mt-20 align-center">
            <a href="" class="btn btn-mod btn-round btn-medium">@lang('common.see-more')</a>
        </div>

    </div>
</section>
<!-- Best Sellers Product  End Section -->

<!-- Sale Product Section -->
<section class="page-section">
    <div class="container relative">

        <h2 class="section-title font-alt mb-70 mb-sm-40">
            @lang('home.sale-products')
        </h2>

        <!-- Product Content -->
        <div class="col-sm-12">
            <div class="row multi-columns-row">
                 <!-- Shop Item -->
                @foreach($new_products as $product)
                <div class="col-md-3 col-lg-3 mb-60 mb-xs-40">
                    <div class="post-prev-img">
                        <a href="{{url('/products')}}/{{$product->id}}"><img class="product-main-img" src="images/shop/shop-prev-1.jpg" alt="" /></a>
                        <div class="intro-label">
                            <span class="label label-danger bg-red">Sale</span>
                        </div>
                    </div>
                    <div class="post-prev-title font-alt align-center">
                        <a href="{{url('/products')}}/{{$product->id}}">{{$product->name}}</a>
                    </div>

                    <div class="post-prev-text align-center">
                        @if(!empty($product->special_price_start_date) && $product->special_price_start_date  <= $product->special_price_end_date )
                            <del class="section-text">{{$product->price}}</del> &nbsp;
                            <strong>{{$product->special_price}}</strong>
                        @else
                            @if($product->old_price > 0)
                            <del class="section-text">{{$product->old_price}}</del> &nbsp;
                            @endif
                            <strong>{{$product->price}}</strong>
                        @endif
                    </div>
                    
                    <div class="post-prev-more align-center">
                        <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                        <input type="hidden" id="product_name" name="product_name" value="{{$product->name}}">
                        <input type="hidden" id="product_price" name="product_price" value="{{$product->price}}">
                        <button class="btn btn-mod btn-gray btn-round add-shoopingcart"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                    </div>
                    
                </div>
                @endforeach
                <!-- End Shop Item -->

            </div>
        </div>

        <div class="mt-20 align-center">
            <a href="" class="btn btn-mod btn-round btn-medium">@lang('common.see-more')</a>
        </div>

    </div>
</section>
<!-- Sale Product  End Section -->


<!-- Section -->
<section class="page-section bg-gray-lighter">
    <div class="container relative">

        <h2 class="section-title font-alt mb-70 mb-sm-40">
            Bạn đang tìm đặc sản hấp dẫn nhất của từng miền?
        </h2>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-text align-center mb-70 mb-xs-40">
                    Tố tụng tìm luật sư, tìm kiếm lên Google, trời mưa mang ô dù, cần đặn sản "chất" của 3 miền thì đến với chúng tôi. Không có một cơ hỏi nhỏ nhoi cho lựa chọn sai. Mở quà ra là bạn bè biết bạn đi đâu, đưa vào miệng là bạn bè bạn cảm nhận dạt dào vùng đất
                    bạn đã đến.
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Item -->
            <div class="col-sm-4 mb-20 wow fadeIn" data-wow-delay="0.1s" data-wow-duration="2s">

                <div class="post-prev-img">
                    <a href="#"><img src="{{ asset('images/foods/mienbac.jpg')}}" alt="" /></a>
                </div>

            </div>
            <!-- End Item -->

            <!-- Item -->
            <div class="col-sm-4 mb-20 wow fadeIn" data-wow-delay="0.2s" data-wow-duration="2s">

                <div class="post-prev-img">
                    <a href="#"><img src="{{ asset('images/foods/mientrung.jpg')}}" alt="" /></a>
                </div>

            </div>
            <!-- End Item -->

            <!-- Item -->
            <div class="col-sm-4 mb-20 wow fadeIn" data-wow-delay="0.3s" data-wow-duration="2s">

                <div class="post-prev-img">
                    <a href="#"><img src="{{ asset('images/foods/miennam.jpg')}}" alt="" /></a>
                </div>

            </div>
            <!-- End Item -->

        </div>

    </div>
</section>
<!-- End Section -->

<!-- Divider -->
<hr class="mt-0 mb-0 " />
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
                        Hoạt động trong lĩnh vực thực phẩm nhiều năm, chúng tôi luôn theo đuổi triêt lý chiều chuộng vị giác khách hàng. Chỉ cần bạn bước 1 bước về phía chúng tôi, 999 bước còn lại chúng tôi sẽ bước.
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

<!-- Newsletter Section -->
<section class="small-section bg-dark-alfa-50 pt-30 pb-30">
    <div class="container relative">
        
        <form class="form align-center" id="mailchimp">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    
                    <div class="newsletter-label font-alt">
                        @lang('footer.newsletter-message')
                    </div>
                    
                    <div class="mb-20">
                        <input placeholder="{{ __('profile.email') }}" class="newsletter-field form-control input-md round mb-xs-10" type="email" pattern=".{5,100}" required/>
                        
                        <button type="submit" class="btn btn-mod btn-w btn-medium btn-round mb-xs-10">
                            @lang('footer.subscribe')
                        </button>
                    </div>
                    
                    <div id="subscribe-result"></div>
                    
                </div>
            </div>
        </form>
        
    </div>
</section>
<!-- End Newsletter Section -->
@endsection