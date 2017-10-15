@extends('layouts.master')
@section('title','Phương Thức Thanh Toán - Cà Phê Đăk Hà')
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
                <a class="costep-link" href="/frontend/en/cart">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Cart</span>
                </a>
            </div>
            <div class="col-2 costep visited" data-step="address">
                <a class="costep-link" href="/frontend/en/Checkout/BillingAddress">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Address</span>
                </a>
            </div>
            <div class="col-2 costep visited" data-step="shipping">
                <a class="costep-link" href="/frontend/en/Checkout/ShippingMethod">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Shipping</span>
                </a>
            </div>
            <div class="col-2 costep active" data-step="payment">
                <a class="costep-link" href="/frontend/en/Checkout/PaymentMethod">
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
                <div class="page payment-method-page">
                    <div class="page-title">
                        <h1 class="h3">Select payment method</h1>
                    </div>
                    <div class="page-body checkout-data">
                        <form action="{{url('/Checkout/PaymentMethod/Next')}}" method="post">
                        {{ csrf_field() }}	
                            <ul class="list-group opt-list payment-methods">
                                <li class="list-group-item opt-list-item payment-method-item active">
                                    <div class="opt-data">
                                        <div class="form-check opt-control option-name radio">
                                            <label class="form-check-label">
                                                <input id="paymentmethod_0" type="radio" name="paymentmethod" data-has-info="true" data-lazy-info="false" class="opt-radio form-check-input"
                                                    value="1">
                                                <span class="opt-name">Cash on delivery</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="opt-info payment-method-info" data-system-name="Payments.CashOnDelivery">
                                        <div class="text-muted">
                                            Once your order is placed, you will be contacted by our staff to confirm the order.
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item opt-list-item payment-method-item">
                                    <div class="opt-data">
                                        <div class="form-check opt-control option-name radio">
                                            <label class="form-check-label">
                                                <input id="paymentmethod_1" type="radio" name="paymentmethod" data-has-info="true" data-lazy-info="false" class="opt-radio form-check-input"
                                                    value="2">
                                                <span class="opt-name">Pay in store</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="opt-info payment-method-info" data-system-name="Payments.PayInStore">


                                        <div class="text-muted">
                                            Reserve items at your local store, and pay in store when you pick up your order.
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item opt-list-item payment-method-item">
                                    <div class="opt-data">
                                        <div class="form-check opt-control option-name radio">
                                            <label class="form-check-label">
                                                <input id="paymentmethod_2" type="radio" name="paymentmethod" data-has-info="true" data-lazy-info="false" class="opt-radio form-check-input"
                                                    value="3">
                                                <span class="opt-name">Prepayment</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="opt-info payment-method-info" data-system-name="Payments.Prepayment">


                                        <div class="text-muted">
                                            Once your order is placed, you will be contacted by our staff to confirm the order.
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item opt-list-item payment-method-item">
                                    <div class="opt-data">
                                        <div class="form-check opt-control option-name radio">
                                            <label class="form-check-label">
                                                <input id="paymentmethod_3" type="radio" name="paymentmethod" checked="checked" data-has-info="true" data-lazy-info="true"
                                                    class="opt-radio form-check-input" value="4">
                                                <span class="opt-name">Credit card (manual)</span>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="buttons">
                                <a class="btn btn-secondary btn-lg" href="{{url('/Checkout/ShippingMethod')}}">
                                    <i class="fa fa-angle-left"></i>
                                    <span>Back</span>
                                </a>
                                <input type="submit" name="nextstep" id="nextstep" class="d-none">

                                <button class="btn btn-warning btn-lg payment-method-next-step-button" onclick="$('#nextstep').trigger('click');return false;">
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
