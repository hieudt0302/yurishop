@extends('layouts.master')
@section('title','Pô Kô Farms - Home')
@section('content')

<!-- Slider -->
<!-- @include('front.home.slider') -->
 <!-- End Slider -->


<div role="main" class="main">
    
    <div class="home-slider-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-push-3">
                    <div class="owl-carousel owl-theme home-banner-slider" data-plugin-options="{'items':1, 'loop': false, 'margin': 5}">
                        @foreach($sliders as $slider)
                        <div>
                            <img class="img-responsive" src="{{asset('/storage/'.$slider->image) }}" alt="Slide">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3 col-md-pull-9">
                    <div class="row">
                        <div class="col-sm-6 col-md-12">
                            <div class="side-custom-menu">
                                <h2>
                                    <i class="fa fa-bars"></i>
                                    Danh mục HOT
                                </h2>

                                <ul>
                                    <li><a href="#">Thời trang UNIQLO</a></li>
                                    <li><a href="#">Thực phẩm chức năng</a></li>
                                    <li><a href="#">Mẹ &amp; Bé</a></li>
                                    <li><a href="#">Sữa bầu</a></li>
                                    <li><a href="#">Son môi</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12">
                            <div class="side-custom-menu mb-none">
                                <h2>
                                    <i class="fa fa-bars"></i>
                                    Không thể bỏ qua
                                </h2>

                                <ul>
                                    <li><a href="#">Khuyến mãi Tết - 70% Off</a></li>
                                    <li><a href="#">Hàng mới về</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="banners-wrapper">
        <div class="container">
            <div class="homepage-bar">
                <div class="row">
                    <div class="col-md-4">
                        <i class="fa fa-truck bar-icon"></i>
                        <div class="bar-textarea">
                            <h3>MIỄN PHÍ VẬN CHUYỂN</h3>
                            <p>Miễn phí vận chuyển mọi đơn hàng trên 500k.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-dollar bar-icon"></i>
                        <div class="bar-textarea">
                            <h3>HOÀN TIỀN 100% NẾU KHÔNG HÀI LÒNG</h3>
                            <p>Khi có bất cứ sai sót nào về sản phẩm.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-support bar-icon"></i>
                        <div class="bar-textarea">
                            <h3>HỖ TRỢ ONLINE 24/7</h3>
                            <p>Hỗ trợ thông qua Messenger và Skyple.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="banners-container">
            <div class="container">
                <div class="row">

                    <div class="col-sm-3 col-xs-6">
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/banners/banner-left-1.jpg')}}" alt="Banner">
                        </a>
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/banners/banner-left-2.jpg')}}" alt="Banner">
                        </a>
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/banners/banner-left-3.jpg')}}" alt="Banner">
                        </a>
                    </div>
                    <div class="col-sm-3 col-xs-6 col-sm-push-6">
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/banners/banner-right-1.jpg')}}" alt="Banner">
                        </a>
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/banners/banner-right-2.jpg')}}" alt="Banner">
                        </a>
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/banners/banner-right-3.jpg')}}" alt="Banner">
                        </a>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-sm-6 col-sm-pull-3">
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/banners/banner-middle-1.jpg')}}" alt="Banner">
                        </a>
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/banners/banner-middle-2.jpg')}}" alt="Banner">
                        </a>
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/banners/banner-middle-3.jpg')}}" alt="Banner">
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    

    <div class="container mb-lg">
        <h2 class="slider-title">
            <span class="inline-title">SẢN PHẨM MỚI</span>
            <span class="line"></span>
        </h2>

        <div class="owl-carousel owl-theme manual new-products-carousel">
            @php($curDate = Carbon\Carbon::now())            
            @foreach ($new_products as $product)
            <div class="product">
                <figure class="product-image-area">
                    <a href="{{url('/products')}}/{{$product->slug}}" title="Product Name" class="product-image">
                        <img src="{{asset('/storage')}}/{{$product->GetMediaByOrderAsc()->thumb??'images/no-image.png'}}" alt="Product Name">
                    </a>
                    @if($product->special_price != 0 && $product->special_price_start_date  <= $curDate && $curDate <= $product->special_price_end_date )
                    <div class="product-label"><span class="discount">SALE</span></div>
                    @endif
                </figure>
                <div class="product-details-area">
                    <h2 class="product-name"><a href="{{url('/products')}}/{{$product->slug}}" title="Product Name">{{$product->translation->name??$product->name}}</a></h2>
                    <div class="product-ratings">
                        <div class="ratings-box">
                            <div class="rating" style="width:{{$product->comments->avg('rate')/5*100}}%"></div>
                        </div>
                    </div>

                    <div class="product-price-box">
                        @if($product->special_price != 0 && $product->special_price_start_date  <= $curDate && $curDate <= $product->special_price_end_date )
                        <span class="old-price">{{FormatPrice::price($product->price)}}</span>
                        <span class="product-price">{{FormatPrice::price($product->special_price)}}</span>
                        @else
                        <span class="product-price">{{FormatPrice::price($product->price)}}</span>
                        @endif
                    </div>

                    <div class="product-actions">
                        <a href="#" class="addtowishlist" title="Thêm vào danh sách yêu thích">
                            <i class="fa fa-heart"></i>
                        </a>
                        <a href="#" class="addtocart" title="Thêm vào giỏ hàng">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Đặt hàng</span>
                        </a>
                        <a href="{{url('/products')}}/{{$product->slug}}" class="comparelink" title="Xem thêm">
                            <i class="fa fa-search"></i>
                        </a>                        
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
@endsection