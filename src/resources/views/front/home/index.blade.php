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
                        <div>
                            <img class="img-responsive" src="{{asset('frontend/img/demos/shop/slides/shop4/slide1.jpg')}}" alt="Slide">
                        </div>
                        <div>
                            <img class="img-responsive" src="{{asset('frontend/img/demos/shop/slides/shop4/slide2.jpg')}}" alt="Slide">
                        </div>
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
                            <h3>GIẢI QUYẾT ĐƠN HÀNG TRONG 24H</h3>
                            <p>Đơn giản hóa mọi thủ tục.</p>
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
            <span class="inline-title">GALAXY PHONES JUST ARRIVED</span>
            <span class="line"></span>
        </h2>

        <div class="owl-carousel owl-theme manual new-products-carousel">
            <div class="product">
                <figure class="product-image-area">
                    <a href="demo-shop-4-product-details.html" title="Product Name" class="product-image">
                        <img src="{{asset('frontend/img/demos/shop/products/shop4/product1.jpg')}}" alt="Product Name">
                    </a>

                    <a href="#" class="product-quickview">
                        <i class="fa fa-share-square-o"></i>
                        <span>Quick View</span>
                    </a>
                    <div class="product-label"><span class="discount">-10%</span></div>
                    <div class="product-label"><span class="new">New</span></div>
                </figure>
                <div class="product-details-area">
                    <h2 class="product-name"><a href="demo-shop-4-product-details.html" title="Product Name">Motorola Phone-Grey</a></h2>
                    <div class="product-ratings">
                        <div class="ratings-box">
                            <div class="rating" style="width:60%"></div>
                        </div>
                    </div>

                    <div class="product-price-box">
                        <span class="old-price">$99.00</span>
                        <span class="product-price">$89.00</span>
                    </div>

                    <div class="product-actions">
                        <a href="#" class="addtowishlist" title="Add to Wishlist">
                            <i class="fa fa-heart"></i>
                        </a>
                        <a href="#" class="addtocart" title="Add to Cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Add to Cart</span>
                        </a>
                        <a href="#" class="comparelink" title="Add to Compare">
                            <i class="glyphicon glyphicon-signal"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="product">
                <figure class="product-image-area">
                    <a href="demo-shop-4-product-details.html" title="Product Name" class="product-image">
                        <img src="{{asset('frontend/img/demos/shop/products/shop4/product4.jpg')}}" alt="Product Name">
                        <img src="{{asset('frontend/img/demos/shop/products/shop4/product4-2.jpg')}}" alt="Product Name" class="product-hover-image">
                    </a>

                    <a href="#" class="product-quickview">
                        <i class="fa fa-share-square-o"></i>
                        <span>Quick View</span>
                    </a>
                    <div class="product-label"><span class="discount">-25%</span></div>
                </figure>
                <div class="product-details-area">
                    <h2 class="product-name"><a href="demo-shop-4-product-details.html" title="Product Name">Samsung Phone-Grey</a></h2>
                    <div class="product-ratings">
                        <div class="ratings-box">
                            <div class="rating" style="width:0%"></div>
                        </div>
                    </div>

                    <div class="product-price-box">
                        <span class="old-price">$120.00</span>
                        <span class="product-price">$90.00</span>
                    </div>

                    <div class="product-actions">
                        <a href="#" class="addtowishlist" title="Add to Wishlist">
                            <i class="fa fa-heart"></i>
                        </a>
                        <a href="#" class="addtocart" title="Add to Cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Add to Cart</span>
                        </a>
                        <a href="#" class="comparelink" title="Add to Compare">
                            <i class="glyphicon glyphicon-signal"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="product">
                <figure class="product-image-area">
                    <a href="demo-shop-4-product-details.html" title="Product Name" class="product-image">
                        <img src="{{asset('frontend/img/demos/shop/products/shop4/product3.jpg')}}" alt="Product Name">
                    </a>

                    <a href="#" class="product-quickview">
                        <i class="fa fa-share-square-o"></i>
                        <span>Quick View</span>
                    </a>
                </figure>
                <div class="product-details-area">
                    <h2 class="product-name"><a href="demo-shop-4-product-details.html" title="Product Name">Samsung Galaxy 4G</a></h2>
                    <div class="product-ratings">
                        <div class="ratings-box">
                            <div class="rating" style="width:60%"></div>
                        </div>
                    </div>

                    <div class="product-price-box">
                        <span class="product-price">$70.00</span>
                    </div>

                    <div class="product-actions">
                        <a href="#" class="addtowishlist" title="Add to Wishlist">
                            <i class="fa fa-heart"></i>
                        </a>
                        <a href="#" class="addtocart" title="Add to Cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Add to Cart</span>
                        </a>
                        <a href="#" class="comparelink" title="Add to Compare">
                            <i class="glyphicon glyphicon-signal"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="product">
                <figure class="product-image-area">
                    <a href="demo-shop-4-product-details.html" title="Product Name" class="product-image">
                        <img src="{{asset('frontend/img/demos/shop/products/shop4/product5.jpg')}}" alt="Product Name">
                    </a>

                    <a href="#" class="product-quickview">
                        <i class="fa fa-share-square-o"></i>
                        <span>Quick View</span>
                    </a>
                    <div class="product-label"><span class="discount">-20%</span></div>
                </figure>
                <div class="product-details-area">
                    <h2 class="product-name"><a href="demo-shop-4-product-details.html" title="Product Name">Motorola Phone</a></h2>
                    <div class="product-ratings">
                        <div class="ratings-box">
                            <div class="rating" style="width:80%"></div>
                        </div>
                    </div>

                    <div class="product-price-box">
                        <span class="old-price">$100.00</span>
                        <span class="product-price">$90.00</span>
                    </div>

                    <div class="product-actions">
                        <a href="#" class="addtowishlist" title="Add to Wishlist">
                            <i class="fa fa-heart"></i>
                        </a>
                        <a href="#" class="addtocart" title="Add to Cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Add to Cart</span>
                        </a>
                        <a href="#" class="comparelink" title="Add to Compare">
                            <i class="glyphicon glyphicon-signal"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="product">
                <figure class="product-image-area">
                    <a href="demo-shop-4-product-details.html" title="Product Name" class="product-image">
                        <img src="{{asset('frontend/img/demos/shop/products/shop4/product5.jpg')}}" alt="Product Name">
                    </a>

                    <a href="#" class="product-quickview">
                        <i class="fa fa-share-square-o"></i>
                        <span>Quick View</span>
                    </a>
                </figure>
                <div class="product-details-area">
                    <h2 class="product-name"><a href="demo-shop-4-product-details.html" title="Product Name">Samsung Phone</a></h2>
                    <div class="product-ratings">
                        <div class="ratings-box">
                            <div class="rating" style="width:0%"></div>
                        </div>
                    </div>

                    <div class="product-price-box">
                        <span class="product-price">$70.00</span>
                    </div>

                    <div class="product-actions">
                        <a href="#" class="addtowishlist" title="Add to Wishlist">
                            <i class="fa fa-heart"></i>
                        </a>
                        <a href="#" class="addtocart" title="Add to Cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Add to Cart</span>
                        </a>
                        <a href="#" class="comparelink" title="Add to Compare">
                            <i class="glyphicon glyphicon-signal"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="product">
                <figure class="product-image-area">
                    <a href="demo-shop-4-product-details.html" title="Product Name" class="product-image">
                        <img src="{{asset('frontend/img/demos/shop/products/shop4/product1.jpg')}}" alt="Product Name">
                    </a>

                    <a href="#" class="product-quickview">
                        <i class="fa fa-share-square-o"></i>
                        <span>Quick View</span>
                    </a>
                    <div class="product-label"><span class="new">New</span></div>
                </figure>
                <div class="product-details-area">
                    <h2 class="product-name"><a href="demo-shop-4-product-details.html" title="Product Name">Samsung Galaxy-White</a></h2>
                    <div class="product-ratings">
                        <div class="ratings-box">
                            <div class="rating" style="width:80%"></div>
                        </div>
                    </div>

                    <div class="product-price-box">
                        <span class="product-price">$80.00</span>
                    </div>

                    <div class="product-actions">
                        <a href="#" class="addtowishlist" title="Add to Wishlist">
                            <i class="fa fa-heart"></i>
                        </a>
                        <a href="#" class="addtocart" title="Add to Cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Add to Cart</span>
                        </a>
                        <a href="#" class="comparelink" title="Add to Compare">
                            <i class="glyphicon glyphicon-signal"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="newsletter-popup mfp-hide" id="newsletter-popup-form" style="background-image: url(../img/demos/shop/newsletter_popup_bg.jpg)">
        <div class="newsletter-popup-content">
            <img src="{{asset('frontend/img/demos/shop/logo-shop.png')}}" alt="Logo" class="img-responsive center-block">
            <h2>BE THE FIRST TO KNOW</h2>
            <p>Subscribe to the Porto eCommerce newsletter to receive timely updates from your favorite products.</p>
            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Email address" required>
                    <span class="input-group-btn">
                        <input type="submit" class="btn btn-default" value="Go!">
                    </span>
                </div><!-- End .from-group -->
            </form>
            <div class="newsletter-subscribe">
                <div class="checkbox mb-none">
                    <label>
                        <input type="checkbox" value="1">
                       Don't show this popup again
                    </label>
                </div>
            </div>
        </div><!-- End .newsletter-popup-content -->
    </div><!-- End .newsletter-popup -->

    </div>
@endsection