<<<<<<< .mine
            <div class="row top-header-container">
                <a href="{{url('/')}}" class="logo-top"></a>
                <div class="cart-block">
                    <span class="order-label">
=======
<div class="top-header" id="topHead">
    <div class="row top-header-container">
        <div class="container">
            <a href="{{url('/')}}" class="logo-top"></a>
            <div class="cart-block">                
                @if (!Auth::guest())
                <span class="order-label">
>>>>>>> .r100
                        <a href="{{ url('/cart') }}" >
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            Giỏ hàng ({{ Cart::count() }})
                        </a>
<<<<<<< .mine
                    </span>
                    @if (!Auth::guest()) 
                    <span class="list-label">
=======
                </span> 
                <span class="list-label">
>>>>>>> .r100
                        <a href="{{ url('/order') }}">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            Danh sách đơn hàng
                        </a>
<<<<<<< .mine
                    </span>
                    @endif
                    <a href="javascript:;" title="Thông báo">
=======
                </span> 
                @endif
                <a href="javascript:;" title="Thông báo">
>>>>>>> .r100
<<<<<<< .mine
                        <i class="fa fa-bell" aria-hidden="true"></i>
                    </a>     
                </div>  
                <div class="user-block"> 
                    @if (Auth::guest())          
                    <a href="{{ url('/register') }}" id="link-modal-sign-up" data-reveal-id="modal-signup" class="modal-signup nb-signup">      
						Đăng ký
                    </a>
=======
                    <i class="fa fa-bell" aria-hidden="true"></i>
                </a>
>>>>>>> .r100
<<<<<<< .mine
                    |
                    <a href="{{ url('/login') }}" id="link-modal-login" data-reveal-id="modal-signup2" class="modal-signup2 nb-signup">
                        @lang('auth.login') 
                    </a>
                    @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i> 
                        <span class="name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ url('/profiles') }}"><i class="fa fa-fw fa-user"></i> Tài Khoản</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
=======
            </div>
            <div class="user-block">
                @if (Auth::guest())
                <a href="{{ url('/register') }}" id="link-modal-sign-up" data-reveal-id="modal-signup" class="modal-signup nb-signup">      
						Đăng ký
                    </a> |
                <a href="{{ url('/login') }}" id="link-modal-login" data-reveal-id="modal-signup2" class="modal-signup2 nb-signup">
                        @lang('auth.login')
            </a> @else
                <div>
                    <li class="dropdown hide-point">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->last_name }} {{ Auth::user()->first_name }}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('/profiles') }}"><i class="fa fa-fw fa-user"></i> Tài Khoản</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/logout') }}" onclick="event.preventDefault();
>>>>>>> .r100
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off"></i> Thoát
                            </a>
 
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul> 
                    @endif
                </div>
            </div>