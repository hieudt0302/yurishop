<div class="main-nav clearfix">
    <div class="container">
        <a href="#" class="mobile-menu clearfix"><i class="fa fa-bars" aria-hidden="true"></i> PÔ KÔ FARM</a>
        <a class="hd-logo" href="{{ url('/')}}"><img class="logo" src="{{asset('frontend/images/logo.png')}}" alt=""></a>
        <nav id="main-Nav">
            <ul class="mainnavitems">
                <li>
                    <a href="{{ url('/')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="{{ url('/about')}}">
                    Pô Kô Farms
                    </a>
                </li>
                @foreach($blog_menu as $menu)
                <li>
                    <a href="{{url('/subject')}}/{{$menu->parent->slug}}/{{$menu->slug}}">
                    {{$menu->translation->name??$menu->name}}
                    </a>
                </li>  
                @endforeach
                <li class="has-submenu">
                    <a href="#">{{$product_menu->translation->name??$product_menu->name}} <i class="fa fa-angle-down" aria-hidden="true"></i> </a>
                    <ul class="submenu" style="z-index: 9999">
                        @foreach($product_menu->GetMenuSubLevel1() as $sub)
                        <li>
                            <a href="{{url('/subject')}}/{{$sub->parent->slug}}/{{$sub->slug}}">
                                <i class="fa fa-angle-right" aria-hidden="true"></i> {{$sub->translation->name??$sub->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/contact')}}">
                        @lang('header.contact')
                    </a>
                </li>
            </ul>
        </nav>
        <nav id="top-Nav">
            <ul class="nav-items">
                <li>
                    <a class="search-top-bt" href="#">
                        <i class="fa fa-search" aria-hidden="true"></i> @lang('header.search')
                    </a>
                </li>
                <li class="has-submenu">
                    <a class="lang-select" href="#">
                        <i class="fa fa-globe" aria-hidden="true"></i>&nbsp;{{ strtoupper(app()->getLocale()) }}
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                    <ul style="z-index: 9999">
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
                <li class="has-submenu">
                    <a class="accunt-select" href="#">
                        @guest
                        @lang('header.account')
                        @else
                            {{Auth::user()->first_name}}
                        @endguest
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                    <ul class="submenu" style="z-index: 9999">
                        @guest
                        <li><a href="{{ url('/login') }}">@lang('auth.login')</a></li>
                        <li><a href="{{ url('/register') }}">@lang('auth.register')</a></li>
                        @else 
                        <li><a href="{{ url('/Account/Info') }}">@lang('account.my-account')</a></li>
                        <li><a href="{{ url('/wishlist') }}">@lang('account.wishlist')</a></li>
                        <li><a href="{{ url('/cart') }}"></i>@lang('shoppings.cart')</a></li>
                        <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"></i>@lang('auth.logout')</a></li>
                        @endguest
                    </ul>
                </li>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <li>
                    <a class="shopping-cart " href="{{url('/cart')}}">
                     <!-- Dont remove the class: shopping-cart-icon -->
                        <i class="fa fa-shopping-cart shopping-cart-icon" aria-hidden="true"></i>&nbsp;
                            <!-- Dont remove the class: cartItemCount -->
                            <span class="cartItemCount">{{ Cart::instance('default')->count(false) }}</span> @lang('shoppings.items')
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>