 <!-- BEGIN | Header -->
 <div class="sticky-wrapper" style="height: 110px;">
    <header class="ht-header" id="hd-fixed">
        <div class="row">
            <div class="topsearch">
                {!! Form::open(array('url' => '/search')) !!}
                    <input type="text" class="search-top" name="keyword" placeholder="@lang('header.enter-keyword')">
                {!! Form::close() !!}
            </div>
        </div>
        <div class="row">
            <nav id="mainNav" class="navbar navbar-default navbar-custom">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <div class="row">
                        <div class="main-logo">
                            <div class="col-md-5">
                                <div class="mobile-btn">
                                    <button id="btn">
                                        <i class="ion-navicon"></i>
                                    </button>
                                    <button id="close-btn">
                                        <i class="ion-android-close"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <a class="hd-logo" href="{{url('/')}}">
                                    <img class="logo" src="{{asset('frontend/images/logo.png')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
                                @lang('header.about-us')
                                </a>
                            </li>                            

                            @foreach($menus as $key => $menu)
                            <li class="dropdown first">
                                <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                                {{$menu->translation->name}}
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu level1">
                                    @foreach($menu->GetMenuSubLevel1() as $sub)
                                    <li>
                                        <a href="{{url('/menu')}}/{{$sub->parent->slug}}/{{$sub->slug}}">
                                            <i class="ion-ios-minus-empty"></i>
                                            {{$sub->translation->name}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                            <li class="dropdown first">
                                <a href="{{ url('/contact')}}" class="btn btn-default lv1">
                                @lang('header.contact')
                                </a>
                            </li>
                            <li class="dropdown first">
                                @guest
                                <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                                    @lang('header.account')<i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <!-- Sub -->
                                <ul class="dropdown-menu level1">    
                                    <li><a href="{{ url('/login') }}"><i class="ion-ios-minus-empty"></i>@lang('auth.login')</a></li>
                                    <li><a href="{{ url('/register') }}"><i class="ion-ios-minus-empty"></i>@lang('auth.register')</a></li>                          
                                </ul>
                                <!-- End Sub -->
                                @else
                                <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                                <i class="fa fa-user" aria-hidden="true"></i>&nbsp;{{ Auth::user()->last_name }} <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu level1">
                                    <li><a href="{{ url('/Account/Info') }}"><i class="ion-ios-minus-empty"></i>@lang('account.my-account')</a></li>
                                    <li><a href="{{ url('/wishlish') }}"><i class="ion-ios-minus-empty"></i>@lang('account.wishlist')</a></li>
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

                            <li class="dropdown first">
                                <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                                    <i class="fa fa-globe" aria-hidden="true"></i>&nbsp;{{ app()->getLocale() }}
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu level1">
                                    <li>
                                        <a href="{{URL::asset('')}}language/vi">
                                            <i class="ion-ios-minus-empty"></i>
                                            Tiếng Việt
                                        </a>                                        
                                    </li>
                                    <li>
                                        <a href="{{URL::asset('')}}language/en">
                                            <i class="ion-ios-minus-empty"></i>
                                            English
                                        </a>                                        
                                    </li> 
                                    <li>
                                        <a href="#">
                                            <i class="ion-ios-minus-empty"></i>
                                            中文
                                        </a>                                        
                                    </li>                                                                                                          
                                </ul>
                            </li>                            
                        </ul>

                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <div class="right-menu">                      
                        <button class="search-top-bt">
                            <i class="ion-ios-search" data-toggle="tooltip" data-placement="top" title="{{ __('common.search') }}"></i>
                        </button>
                        <a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart shopping-cart-icon" aria-hidden="true" data-toggle="tooltip" title="{{ Cart::instance('default')->count(false) }}"></i></a>
                    </div>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
    </header>
</div>
<!-- END | Header -->