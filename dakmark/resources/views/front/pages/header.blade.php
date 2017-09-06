    <!--header-->
        <div class="header">
            <div class="header-top">
                <div class="container">
                    <div class="top-right">
                    <ul>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i> {{ app()->getLocale() }} <b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a href="{{URL::asset('')}}language/vi" style="color:#000;"><img src="{{url('public/assets/img/flags/vn.png')}}" alt="img"> Tiếng Việt</a></li>
                                <li><a href="{{URL::asset('')}}language/en" style="color:#000;"><img src="{{url('public/assets/img/flags/en.png')}}" alt="img"> English</a></li>
                            </ul>
                        </li>                        
                    @if (Auth::guest())
                        <li>
                            <a href="{{ url('/login') }}" id="link-modal-login" data-reveal-id="modal-signup2" class="modal-signup2 nb-signup">
                                    <i class="fa fa-fw fa-sign-in"></i> @lang('auth.login')
                            </a> 
                        </li>
                        <li>
                            <a href="{{ url('/register') }}" id="link-modal-sign-up" data-reveal-id="modal-signup" class="modal-signup nb-signup">      
                                    <i class="fa fa-fw fa-user-plus"></i> @lang('auth.register')
                            </a> 
                        </li>
                        @else
                        <li class="dropdown hide-point">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->last_name }} {{ Auth::user()->first_name }}<b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu">
                                <li >
                                    <a tabindex="-1" href="{{ url('/order') }}"><i class="fa fa-fw fa-list-alt" ></i> @lang('shoppings.order-history')</a>
                                </li>                          
                                <li>
                                    <a tabindex="-1" href="{{ url('/profile') }}"><i class="fa fa-fw fa-user"></i> @lang('common.profile')</a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="{{ url('/logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-fw fa-power-off"></i> @lang('auth.logout')
                                </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif                        
                    </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="heder-bottom">
                <div class="container">
                    <div class="logo-nav">
                        <div class="logo-nav-left">
                            <a href="{{url('/')}}" class="logo-top"><img alt="" src="{{url('public/assets/img/logo-dark-mark-200.png')}}" /></a>
                        </div>
                        <div class="logo-nav-left1">
                            <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header nav_2">
                                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div> 
                            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                                <ul class="nav navbar-nav">
                                    <li class="menu-item"><a href="{{ url('/') }}" class="act">@lang('header.home')</a></li>   
                                    <li class="menu-item"><a href="{{ url('/about-us') }}">@lang('header.about-us')</a></li>
                                    <li class="menu-item"><a href="{{ url('/cert') }}">@lang('header.cert')</a></li>
                                    <li class="menu-item">
                                        <a href="#">@lang('header.shop')</a>
                                        <?php 
                                            $productCats = \DB::table('product_cat')->where('parent_id', 0)->orderBy('sort_order', 'asc')->get();
                                        ?>
                                        @if(!empty($productCats))
                                        <ul class="sub-menu">
                                            @foreach ($productCats as $pCat)
                                            <?php $pCatSeo = \DB::table('seo')->where('system_id', $pCat->system_id)->first(); ?>
                                            <li>
                                                <a href="{{ route('front.product.show',$pCatSeo->slug) }}" title="{{ $pCat->name }}">
                                                    {{ $pCat->name }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    <li class="menu-item"><a href="{{ url('/blogs') }}">@lang('header.blog')</a></li>                                    
                                    <li class="menu-item"><a href="{{ url('/contact') }}">@lang('header.contact')</a></li>
                                </ul>
                            </div>
                            </nav>
                        </div>
                        <div class="logo-nav-right">
                            <div id="cd-search" class="cd-search">
                                <form action="#" method="post">
                                    <input name="Search" type="search" placeholder="Search...">
                                </form>
                            </div>  
                        </div>
                        <div class="header-right2">
                            <div class="cart box_1">
                                <p>
                                    {{ Cart::instance('default')->count(false) }} @lang('shoppings.items')
                                    <a href="{{ url('/cart') }}" >
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-circle-thin fa-stack-2x" aria-hidden="true" style='color:#000;'></i>
                                          <i class="fa fa-shopping-cart fa-stack-1x" aria-hidden="true" style='color:#000;'></i>
                                        </span>                                        
                                    </a>
                                </p>
                                <div class="clearfix"> </div>
                            </div>  
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header-->