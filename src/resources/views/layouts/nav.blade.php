<!-- BEGIN | Header -->
<div class="sticky-wrapper" style="height: 110px;">
    <header class="ht-header" id="hd-fixed">
        <div class="row">
            <nav id="mainNav" class="navbar navbar-default navbar-custom">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="row">
                        <div class="main-logo">
                            <div class="col-md-5">
                                <div class="mobile-btn">
                                    <button id="btn"><i class="ion-navicon"></i></button>
                                    <button id="close-btn"><i class="ion-android-close"></i></button>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <a class="hd-logo" href="{{ url('/')}}"><img class="logo" src="{{asset('frontend/images/logo.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav hd-menu">
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>
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
                            <li class="dropdown first">
                                <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">{{$product_menu->translation->name??$product_menu->name}} <i class="fa fa-angle-down" aria-hidden="true"></i> </a>
                                <ul class="dropdown-menu level1">
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

                            <li class="">
                                &nbsp; &nbsp;
                            </li>
                            <li>
                                <a class="main-right-menu search-top-bt" href="javascript:void(0);"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="Search"></i></a>
                            </li>
                            <li>
                                <a class="main-right-menu shopping-cart" href="{{ url('/cart') }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;{{ Cart::instance('default')->count(false) }} @lang('shoppings.items')
                                </a>
                            </li>
                            <li class="dropdown first">
                                <a class="main-right-menu btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                                    @guest
                                        @lang('header.account')
                                    @else
                                        {{Auth::user()->first_name}}
                                    @endguest
                                    &nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu level1">
                                    @guest
                                    <li><a href="{{ url('/login') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> @lang('auth.login')</a></li>
                                    <li><a href="{{ url('/register') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> @lang('auth.register')</a></li>
                                    @else 
                                    <li><a href="{{ url('/Account/Info') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> @lang('account.my-account')</a></li>
                                    <li><a href="{{ url('/wishlist') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> @lang('account.wishlist')</a></li>
                                    <li><a href="{{ url('/cart') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> @lang('shoppings.cart')</a></li>
                                    <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-angle-right" aria-hidden="true"></i> @lang('auth.logout')</a></li>
                                    @endguest
                                </ul>
                            </li>
                            <li class="dropdown first">
                                <a class="main-right-menu btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                                    <i class="fa fa-globe" aria-hidden="true"></i>&nbsp;{{ strtoupper(app()->getLocale()) }}
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
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
                        </ul>
                    </div>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
    </header>
</div>
<!-- END | Header -->