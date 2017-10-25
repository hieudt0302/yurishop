 <!-- BEGIN | Header -->
<section id="topbar">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <ul class="nav navbar-nav hd-menu topbar-right">
                <li class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                        <i class="fa fa-globe" aria-hidden="true"></i>&nbsp;{{ app()->getLocale() }}
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
                            <a href="#">
                                中文
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
                        <li><a href="{{ url('/login') }}"><i class="ion-ios-minus-empty"></i>@lang('auth.login')</a></li>
                        <li><a href="{{ url('/register') }}"><i class="ion-ios-minus-empty"></i>@lang('auth.register')</a></li>                          
                    </ul>
                    <!-- End Sub -->
                    @else
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
                    <i class="fa fa-user" aria-hidden="true"></i>&nbsp;{{ Auth::user()->first_name }} <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu level1">
                        <li><a href="{{ url('/Account/Info') }}"><i class="ion-ios-minus-empty"></i>@lang('account.my-account')</a></li>
                        <li><a href="{{ url('/wishlist') }}"><i class="ion-ios-minus-empty"></i>@lang('account.wishlist')</a></li>
                        <li><a href="{{ url('/cart') }}"><i class="ion-ios-minus-empty"></i>@lang('shoppings.cart')</a></li>
                        <li class="it-last">
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="ion-ios-minus-empty"></i>@lang('auth.logout')
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
            <form action="GET">
                <input type="text" class="search-top" placeholder="What are you looking for ?">
            </form>
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
                            <span class="phone">0122 333 8889</span>
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
                            <i href="{{ url('/cart') }}" class="ion-ios-cart-outline"></i>
                        </button>
                        
                        <div class="hd-infor">
                            <p>@lang('shoppings.cart')</p>
                            <span>{{ Cart::instance('default')->count(false) }} @lang('shoppings.items')</span>
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
                            Pokofarms
                            </a>
                        </li>                            
                        <!-- Blog menu -->
                        @foreach($blog_menu as $menu)
                        <li class="dropdown first">
                            <a href="{{url('/menu')}}/{{$menu->parent->slug}}/{{$menu->slug}}" class="btn btn-default lv1">
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
                                    <a href="{{url('/menu')}}/{{$sub->parent->slug}}/{{$sub->slug}}">
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