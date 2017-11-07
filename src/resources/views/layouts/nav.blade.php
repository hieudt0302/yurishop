 <!-- BEGIN | Header -->
<section id="topbar">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="top-left">
                <p><span></span></p>
            </div>        
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <ul class="nav navbar-nav hd-menu topbar-right">
                <li class="dropdown">
                    <button class="btn search-top-bt  btn-default">
                        <i class="fa fa-search"></i>
                        &nbsp;@lang{{ strtoupper( __('header.search')) }}
                    </button>
                </li>
                <li class="dropdown">
                     
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                        <i class="fa fa-globe" aria-hidden="true"></i>&nbsp;{{ strtoupper(app()->getLocale()) }}
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu level1">
                        <li>
                            <a href="{{URL::asset('')}}language/vi">
                                Tiếng Việt
                            </a>                                        
                        </li>
                        <li>
                            <a href="{{URL::asset('')}}language/en">
                                English
                            </a>                                        
                        </li> 
                        <li>
                            <a href="{{URL::asset('')}}language/cn">
                                中文
                            </a>                                        
                        </li> 
                        <li>
                            <a href="{{URL::asset('')}}language/jp">
                                日本語
                            </a>                                        
                        </li> 
                        <li>
                            <a href="{{URL::asset('')}}language/kr">
                                한국어
                            </a>                                        
                        </li>                                                                                                                                                          
                    </ul>
                </li>
                <li class="dropdown">
                    @guest
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                        @lang('header.account')<i class="fa fa-angle-down" aria-hidden="true"></i>
                    </button>
                    <!-- Sub -->
                    <ul class="dropdown-menu level1">    
                        <li><a href="{{ url('/login') }}">@lang('auth.login')</a></li>
                        <li><a href="{{ url('/register') }}">@lang('auth.register')</a></li>                          
                    </ul>
                    <!-- End Sub -->
                    @else
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                    <i class="fa fa-user" aria-hidden="true"></i>&nbsp;{{ strtoupper(Auth::user()->first_name) }} <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu level1">
                        <li><a href="{{ url('/Account/Info') }}">@lang('account.my-account')</a></li>
                        <li><a href="{{ url('/wishlist') }}">@lang('account.wishlist')</a></li>
                        <li><a href="{{ url('/cart') }}"></i>@lang('shoppings.cart')</a></li>
                        <li class="it-last">
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                @lang('auth.logout')
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    @endguest
                </li>                        
            </ul>
        </div>
    </div>
</section>
<header class="ht-headerv3 ht-headerv4 sidebarmenu">
    <div class="row">
        <div class="topsearch">
            {!! Form::open(array('url' => '/search')) !!}
                <input type="text" class="search-top" name="key" placeholder="@lang('header.enter-keyword')">
            {!! Form::close() !!}
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="main-logo4">
                <div class="row">
                <div class="col-md-2">
                    <div class="mobile-btn">
                        <button id="btn"><i class="ion-navicon"></i></button>
                        <button id="close-btn"><i class="ion-android-close"></i></button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hd-if">
                        <div class="hd-infor">
                            <p>@lang('header.call-us-now')</p>
                            <span class="phone">{{ Setting::config('hotline') }}</span>
                        </div>
                        <i class="ion-ios-telephone-outline"></i>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="header-logov3">
                        <a class="hd-logo3" href="{{url('/')}}">
                            <img class="logo" src="{{asset('frontend/images/logo.png')}}" alt="">
                        </a>                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hd-if right">
                        <button class="open4">
                            <a href="{{ url('/cart') }}"><i class="ion-ios-cart-outline  shopping-cart-icon"></i></a>
                        </button>
                        
                        <div class="hd-infor">
                            <p>@lang('shoppings.cart')</p>
                            <span><p class="cartItemCount" style="display: inline;">{{ Cart::instance('default')->count(false) }}</p> @lang('shoppings.items')</span>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-12 nav4">
            <nav id="mainNav3">
                <div class="navbar-header">
                </div>
                    <ul class="nav navbar-nav hd-menu">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="dropdown first">
                            <a href="{{ url('/')}}" class="btn btn-default lv1">
                            @lang('header.home')
                            </a>
                        </li>
                        <li class="dropdown first">
                            <a href="{{ url('/about')}}" class="btn btn-default lv1">
                            Pô Kô Farms
                            </a>
                        </li>                            
                        <!-- Blog menu -->
                        @foreach($blog_menu as $menu)
                        <li class="dropdown first">
                            <a href="{{url('/subject')}}/{{$menu->parent->slug}}/{{$menu->slug}}" class="btn btn-default lv1">
                            {{$menu->translation->name??$menu->name}}
                            </a>
                        </li>  
                        @endforeach

                        <li class="dropdown first">
                            <a href="{{ url('/promotion')}}" class="btn btn-default lv1">
                            @lang('header.promotion')
                            </a>
                        </li> 

                        <!-- Product menu -->
                        <li class="dropdown first">
                            <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                            {{$product_menu->translation->name??$product_menu->name}}
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu level1">
                                @foreach($product_menu->GetMenuSubLevel1() as $sub)
                                <li>
                                    <a href="{{url('/subject')}}/{{$sub->parent->slug}}/{{$sub->slug}}">
                                        <i class="ion-ios-minus-empty"></i>
                                        {{$sub->translation->name??$sub->name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="dropdown first">
                            <a href="{{ url('/contact')}}" class="btn btn-default lv1">
                            @lang('header.contact')
                            </a>
                        </li>
                    </ul>
            </nav>
        </div>
    </div>
</header>
<!-- END | Header -->