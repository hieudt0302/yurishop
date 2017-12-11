 <!-- BEGIN | Header -->
<section id="topbar">
    <div class="row">
        <div class="col-md-6 hidden-sm hidden-xs">
            <div class="top-left">
                <!-- <a href="{{ url('/') }}">@lang('header.home')</a>    -->
                <p><span>&nbsp</span></p>
            </div>        
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
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
                    <ul class="dropdown-menu level1">    
                        <li><a href="{{ url('/login') }}">@lang('auth.login')</a></li>
                        <li><a href="{{ url('/register') }}">@lang('auth.register')</a></li>                          
                    </ul>
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
<div class="sticky-wrapper" style="height: 110px;">
    <header class="ht-header sidebarmenu" id="hd-fixed">
        <div class="row">
            <div class="topsearch">
                {!! Form::open(array('url' => '/search')) !!}
                    <input type="text" class="search-top" name="key" placeholder="@lang('header.enter-keyword')">
                {!! Form::close() !!}
            </div>
        </div>
        
        <div class="row">
            <nav id="mainNav" class="navbar navbar-default navbar-custom">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="col-lg-3 col-md-10 col-sm-10 col-xs-10">   
                    <div class="main-logo row">
                        <div class="hidden-lg col-sm-3 col-xs-3">
                            <div class="mobile-btn">
                                <button id="btn" style="display: block;"><i class="ion-navicon"></i></button>
                                <button id="close-btn"><i class="ion-android-close"></i></button>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-4 col-xs-offset-2">
                            <a class="hd-logo" href="{{ url('/')}}"><img class="logo" src="{{asset('frontend/images/logo.png')}}" alt=""></a>    
                        </div>
                    </div>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="col-lg-7 hidden-xs hidden-sm hidden-md">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav hd-menu">
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>
                            <li class="dropdown first">
                                <a href="{{ url('/')}}" class="btn btn-default lv1"><i class="fa fa-home" aria-hidden="true"></i></a>
                            </li>
                            <li class="dropdown first">
                                <a href="{{ url('/about')}}" class="btn btn-default lv1">
                                Pô Kô Farms
                                </a>
                            </li>
                            @foreach($blog_menu as $menu)
                            <li class="dropdown first">
                                <a href="{{url('/subject')}}/{{$menu->parent->slug}}/{{$menu->slug}}" class="btn btn-default lv1">
                                {{$menu->translation->name??$menu->name}}
                                </a>
                            </li>  
                            @endforeach
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
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <div class="right-menu">
                        <button class="opennav2"><i class="ion-ios-cart-outline" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to cart"></i></button>
                    </div>
                </div>
            <!-- /.navbar-collapse -->
            </nav>
        </div>
    </header>
</div>
<!-- END | Header -->