<div class="top-header" id="topHead" style="position:absolute; height: 100px;">
    <div class="row top-header-container">
        <div class="language-bar">
            <div class="float-right">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{URL::asset('')}}language/vi">Tiếng Việt</a></li>
                    <li><a href="{{URL::asset('')}}language/en">Tiếng Anh</a></li>
                </ul>
            </div>          
        </div>        
        <div class="container">
            <a href="{{url('/')}}" class="logo-top"><img alt="" src="{{url('assets/img/logo-dark-mark-200.png')}}" /></a>
            <div class="cart-block">                               
                <span class="order-label">
                        <a href="{{ url('/cart') }}" >
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            @lang('shoppings.cart') ({{ Cart::instance('default')->count(false) }})
                        </a>
                </span> 
            </div>
            <div class="user-block">
                @if (Auth::guest())
                <a href="{{ url('/register') }}" id="link-modal-sign-up" data-reveal-id="modal-signup" class="modal-signup nb-signup">      
						<i class="fa fa-fw fa-user-plus"></i> @lang('auth.register')
                    </a> |
                <a href="{{ url('/login') }}" id="link-modal-login" data-reveal-id="modal-signup2" class="modal-signup2 nb-signup">
                        <i class="fa fa-fw fa-sign-in"></i> @lang('auth.login')
            </a> @else
                <div>
                    <li class="dropdown hide-point">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->last_name }} {{ Auth::user()->first_name }}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('/profile') }}"><i class="fa fa-fw fa-list-alt"></i> @lang('shoppings.order-history')</a>
                            </li>
                            <li class="divider"></li>                            
                            <li>
                                <a href="{{ url('/profile') }}"><i class="fa fa-fw fa-user"></i> @lang('common.profile')</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off"></i> @lang('auth.logout')
                            </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>