<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 147, 'stickySetTop': '-147px', 'stickyChangeLogo': false}">
    <div class="header-body">
        <div class="header-top">
            <div class="container">
                <!-- <div class="dropdowns-container">
                    <div class="header-dropdown cur-dropdown">
                        <a href="#">USD <i class="fa fa-caret-down"></i></a>

                        <ul class="header-dropdownmenu">
                            <li><a href="#">EUR</a></li>
                            <li><a href="#">USD</a></li>
                        </ul>
                    </div>

                    <div class="header-dropdown lang-dropdown">
                        <a href="#"><img src="{{asset('frontend/img/demos/shop/en.png')}}" alt="English">English <i class="fa fa-caret-down"></i></a>

                        <ul class="header-dropdownmenu">
                            <li><a href="#"><img src="{{asset('frontend/img/demos/shop/en.png')}}" alt="English">English</a></li>
                            <li><a href="#"><img src="{{asset('frontend/img/demos/shop/fr.png')}}" alt="French">French</a></li>
                        </ul>
                    </div>

                    <div class="compare-dropdown">
                        <a href="#"><i class="fa fa-retweet"></i> Compare (2)</a>

                        <div class="compare-dropdownmenu">
                            <div class="dropdownmenu-wrapper">
                                <ul class="compare-products">
                                    <li class="product">
                                        <a href="#" class="btn-remove" title="Remove Product"><i class="fa fa-times"></i></a>
                                        <h4 class="product-name"><a href="demo-shop-4-product-details.html">White top</a></h4>
                                    </li>
                                    <li class="product">
                                        <a href="#" class="btn-remove" title="Remove Product"><i class="fa fa-times"></i></a>
                                        <h4 class="product-name"><a href="demo-shop-4-product-details.html">Blue Women Shirt</a></h4>
                                    </li>
                                </ul>

                                <div class="compare-actions">
                                    <a href="#" class="action-link">Clear All</a>
                                    <a href="#" class="btn btn-primary">Compare</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->      
                
                <div class="top-menu-area">
                    <a href="#">Links <i class="fa fa-caret-down"></i></a>
                    <ul class="top-menu">
                        <li><a href="#">Deal tốt hàng ngày</a></li>
                        @guest
                        <li><a href="{{ url('/login') }}">Đăng nhập</a></li>
                        <li><a href="{{ url('/register') }}">Đăng kí</a></li>
                        @else                                                                        
                        <li><a href="{{ url('/Account/Info') }}">Tài khoản</a></li>
                        <li><a href="{{ url('/wishlist') }}">Wishlist</a></li>
                        <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Thoát</a></li>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        @endguest
                    </ul>
                </div>
                @guest
                <p class="welcome-msg">CẢM ƠN ĐÃ GHÉ THĂM SHOP!</p>
                @else
                <p class="welcome-msg">XIN CHÀO {{Auth::user()->first_name}}!</p>
                @endguest
            </div>
        </div>
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-logo">
                        <a href="demo-shop-4.html">
                            <img alt="Porto" width="111" height="51" src="{{asset('frontend/img/demos/shop/logo-shop-white.png')}}">
                        </a>
                    </div>
                </div>
                <div class="header-column">
                    <div class="row">
                        <div class="cart-area">
                            <div class="custom-block">
                                <i class="fa fa-phone"></i>
                                <span>0945889886</span>
                                <span class="split"></span>
                                <a href="{{ url('/contacts') }}">LIÊN HỆ</a>
                            </div>

                            <div class="cart-dropdown">
                                <a href="#" class="cart-dropdown-icon">
                                    <i class="minicart-icon"></i>
                                    <span class="cart-info">
                                        <span class="cart-qty">{{ Cart::instance('default')->count(false) }}</span>
                                        <span class="cart-text">sản phẩm</span>
                                    </span>
                                </a>

                                <div class="cart-dropdownmenu right">
                                    <div class="dropdownmenu-wrapper">
                                        <div class="cart-products">
                                            <div class="product product-sm">
                                                <a href="#" class="btn-remove" title="Remove Product">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <figure class="product-image-area">
                                                    <a href="demo-shop-4-product-details.html" title="Product Name" class="product-image">
                                                        <img src="{{asset('frontend/img/demos/shop/products/thumbs/cart-product1.jpg')}}" alt="Product Name">
                                                    </a>
                                                </figure>
                                                <div class="product-details-area">
                                                    <h2 class="product-name"><a href="demo-shop-4-product-details.html" title="Product Name">Blue Women Top</a></h2>

                                                    <div class="cart-qty-price">
                                                        1 X 
                                                        <span class="product-price">$65.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product product-sm">
                                                <a href="#" class="btn-remove" title="Remove Product">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <figure class="product-image-area">
                                                    <a href="demo-shop-4-product-details.html" title="Product Name" class="product-image">
                                                        <img src="{{asset('frontend/img/demos/shop/products/thumbs/cart-product2.jpg')}}" alt="Product Name">
                                                    </a>
                                                </figure>
                                                <div class="product-details-area">
                                                    <h2 class="product-name"><a href="demo-shop-4-product-details.html" title="Product Name">Black Utility Top</a></h2>

                                                    <div class="cart-qty-price">
                                                        1 X 
                                                        <span class="product-price">$39.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cart-totals">
                                            Tổng: <span>$104.00</span>
                                        </div>

                                        <div class="cart-actions">
                                            <a href="demo-shop-4-cart.html" class="btn btn-primary">Xem giở hàng</a>
                                            <a href="demo-shop-4-checkout.html" class="btn btn-primary">Thanh toán</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="header-search">
                            <a href="#" class="search-toggle"><i class="fa fa-search"></i></a>
                            {!! Form::open(array('url' => '/search')) !!}
                                <div class="header-search-wrapper">
                                    <input type="text" class="form-control" name="key" id="q" placeholder="Tìm kiếm..." required>
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            {!! Form::close() !!}
                        </div>

                        <a href="#" class="mmenu-toggle-btn" title="Toggle menu">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container header-nav">
            <div class="container">
                <div class="header-nav-main">
                    <nav>
                        <ul class="nav nav-pills" id="mainNav">
                            <li>
                                <a href="{{ url('/')}}">
                                    Trang chủ
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/')}}">
                                    Mỹ phẩm <span class="tip tip-hot">Hot!</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/')}}">
                                    Thời trang
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/')}}">
                                    Mẹ và bé <span class="tip tip-hot">Hot!</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/')}}">
                                    Sản phẩm khác
                                </a>
                            </li>                                                                                                                                           
                            
                            <li class="pull-right">
                                <a href="demo-shop-4-contact-us.html">
                                    Blog 
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-nav">
    <div class="mobile-nav-wrapper">
        <ul class="mobile-side-menu">
            <li><a href="demo-shop-4.html">Trang chủ</a></li>
            <li>
                <a href="#">Mỹ phẩm <span class="tip tip-new">Hot</span></a>
            </li>
            <li>
                <a href="demo-shop-4-about-us.html">Thời trang</a>
            </li>
            <li>
                <a href="demo-shop-4-about-us.html">Mẹ và bé</a>
            </li>            
            <li>
                <a href="demo-shop-4-contact-us.html">Blog</a>
            </li>
        </ul>
    </div>
</div>

<div id="mobile-menu-overlay"></div>