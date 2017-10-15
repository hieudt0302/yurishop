@extends('layouts.master')
@section('title','Phương Thức Vận Chuyển - Cà Phê Đăk Hà')
@section('header') @parent
<!-- OVERRIDER MASTER CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/theme.css') }}"> 
@endsection 

@section('content')
<div id="content-wrapper">
    <section id="content" class="container mt-3">
        <div class="costeps row no-gutters">
            <div class="col-2 costep visited" data-step="cart">
                <a class="costep-link" href="{{url('/cart')}}">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Cart</span>
                </a>
            </div>
            <div class="col-2 costep visited" data-step="address">
                <a class="costep-link" href="{{url('/Checkout/BillingAddress')}}">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Address</span>
                </a>
            </div>
            <div class="col-2 costep active" data-step="shipping">
                <a class="costep-link" href="{{url('/Checkout/ShippingMethod')}}">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Shipping</span>
                </a>
            </div>
            <div class="col-2 costep inactive" data-step="payment">
                <a class="costep-link" href="javascript:void(0)">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Payment</span>
                </a>
            </div>
            <div class="col-2 costep inactive" data-step="confirm">
                <a class="costep-link" href="javascript:void(0)">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Confirm</span>
                </a>
            </div>
            <div class="col-2 costep inactive" data-step="complete">
                <a class="costep-link" href="javascript:void(0)">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Complete</span>
                </a>
            </div>
        </div>
        <div id="content-body" class="row mt-4">
            <div id="content-center" class="col-lg-12">
                <div class="page shipping-method-page">
                    <div class="page-title">
                        <h1 class="h3">Select shipping method</h1>
                    </div>
                    <div class="page-body checkout-data">
                        <form action="{{url('/Checkout/ShippingMethod/Next')}}" method="POST">
                        {{ csrf_field() }}	
                            <ul class="list-group opt-list shipping-options">
                                <li class="list-group-item opt-list-item shipping-option-item active">
                                    <div class="opt-data">
                                        <div class="form-check opt-control option-name radio">
                                            <label class="form-check-label">
                                                <input id="shippingoption_0" type="radio" name="shippingoption" class="opt-radio form-check-input" checked="checked" value="1">
                                                <span class="opt-name">Pickup</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="opt-info text-muted shipping-option-description">
                                        Get your order directly from us.
                                    </div>
                                </li>
                                <li class="list-group-item opt-list-item shipping-option-item">
                                    <div class="opt-data">
                                        <div class="form-check opt-control option-name radio">
                                            <label class="form-check-label">
                                                <input id="shippingoption_1" type="radio" name="shippingoption" class="opt-radio form-check-input" value="2">
                                                <span class="opt-name">Shipping</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="opt-info text-muted shipping-option-description">
                                        Your order will be sent to you by our shipping partners.
                                    </div>
                                </li>
                                <li class="list-group-item opt-list-item shipping-option-item">
                                    <div class="opt-data">
                                        <div class="form-check opt-control option-name radio">
                                            <label class="form-check-label">
                                                <input id="shippingoption_2" type="radio" name="shippingoption" class="opt-radio form-check-input" value="3">
                                                <span class="opt-name">Delivery from Vietnam by courier</span>
                                            </label>
                                        </div>
                                        <div class="opt-fee shipping-fee text-danger">
                                            $61.20
                                        </div>
                                    </div>
                                    <div class="opt-info text-muted shipping-option-description">
                                    The dispatch will be initiated by us in your order. For orders below $300, we charge a surcharge of $30.</div>
                                </li>
                                <li class="list-group-item opt-list-item shipping-option-item">
                                    <div class="opt-data">
                                        <div class="form-check opt-control option-name radio">
                                            <label class="form-check-label">
                                                <input id="shippingoption_3" type="radio" name="shippingoption" class="opt-radio form-check-input" value="4">
                                                <span class="opt-name">Self Pickup</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="opt-info text-muted shipping-option-description">
                                        Collection from stock in Vietnam. 5% Discount</div>
                                </li>
                            </ul>
                            <div class="buttons">
                                <a class="btn btn-secondary btn-lg" href="{{url('/Checkout/ShippingAddress')}}">
                                    <i class="fa fa-angle-left"></i>
                                    <span>Back</span>
                                </a>

                                <input type="submit" name="nextstep" id="nextstep" class="d-none">

                                <button class="btn btn-warning btn-lg shipping-method-next-step-button" onclick="$('#nextstep').trigger('click');return false;">
                                    <span>Next</span>
                                    <i class="fa fa-angle-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script> 
    <script type="text/javascript" src="{{ asset('js/viewport.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/eventbroker.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/underscore.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/underscore.mixins.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/underscore.string.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/system.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/system.common.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/public.common.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/throbber.js') }}"></script>     
    <script type="text/javascript" src="{{ asset('js/doAjax.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/jquery.bootstrap-touchspin.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/offcanvas.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/offcanvas-cart.js') }}"></script> 

	<script type="text/javascript">
        $(function() {
            $('.checkout-data .opt-radio').on('change', function (e) {
                var radio = $(this);
                var systemName = radio.val();
                $('.checkout-data .opt-list-item').removeClass('active');
                var item = radio.closest('.opt-list-item');
                item.addClass("active");
            });
        });
    </script>
@endsection
