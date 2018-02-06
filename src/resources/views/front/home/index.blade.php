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
                            <img src="{{asset('frontend/img/demos/shop/banners/shop4/banner1.jpg')}}" alt="Banner">
                        </a>
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/demos/shop/banners/shop4/banner2.jpg')}}" alt="Banner">
                        </a>
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/demos/shop/banners/shop4/banner3.jpg')}}" alt="Banner">
                        </a>
                    </div>
                    <div class="col-sm-3 col-xs-6 col-sm-push-6">
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/demos/shop/banners/shop4/banner7.jpg')}}" alt="Banner">
                        </a>
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/demos/shop/banners/shop4/banner8.jpg')}}" alt="Banner">
                        </a>
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/demos/shop/banners/shop4/banner9.jpg')}}" alt="Banner">
                        </a>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-sm-6 col-sm-pull-3">
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/demos/shop/banners/shop4/banner4.jpg')}}" alt="Banner">
                        </a>
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/demos/shop/banners/shop4/banner5.jpg')}}" alt="Banner">
                        </a>
                        <a href="#" class="banner">
                            <img src="{{asset('frontend/img/demos/shop/banners/shop4/banner6.jpg')}}" alt="Banner">
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
            @foreach ($new_products as $product)
            <div class="product">
                <figure class="product-image-area">
                    <a href="{{url('/products')}}/{{$product->slug}}" title="Product Name" class="product-image">
                        <img src="{{asset('/storage')}}/{{$product->GetMediaByOrderAsc()->thumb??'images/no-image.png'}}" alt="Product Name">
                    </a>
                    <div class="product-label"><span class="discount">-10%</span></div>
                    <div class="product-label"><span class="new">New</span></div>
                </figure>
                <div class="product-details-area">
                    <h2 class="product-name"><a href="{{url('/products')}}/{{$product->slug}}" title="Product Name">{{$product->translation->name??$product->name}}</a></h2>
                    <div class="product-ratings">
                        <div class="ratings-box">
                            <div class="rating" style="width:60%"></div>
                        </div>
                    </div>

                    <div class="product-price-box">
                        <span class="old-price">$99.00</span>
                        <span class="product-price">{{FormatPrice::price($product->price)}}</span>
                    </div>

                    <div class="product-actions">
                        <a href="#" class="addtowishlist" title="Add to Wishlist">
                            <i class="fa fa-heart"></i>
                        </a>
                        <a href="#" class="addtocart" title="Add to Cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Thêm vào giỏ hàng</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
@endsection