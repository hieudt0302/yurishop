@extends('layouts.master')
@section('title','Xác Nhận Đơn Hàng - Pokofarms')
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
            <div class="col-2 costep visited" data-step="shipping">
                <a class="costep-link" href="{{url('/Checkout/ShippingMethod')}}">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Shipping</span>
                </a>
            </div>
            <div class="col-2 costep visited" data-step="payment">
                <a class="costep-link" href="{{url('/Checkout/PaymentMethod')}}">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Payment</span>
                </a>
            </div>
            <div class="col-2 costep visited" data-step="confirm">
                <a class="costep-link" href="{{url('/Checkout/Confirm')}}">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Confirm</span>
                </a>
            </div>
            <div class="col-2 costep active" data-step="complete">
                <a class="costep-link" href="javascript:void(0)">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Complete</span>
                </a>
            </div>
        </div>
        <div id="content-body" class="row mt-4">
            <div id="content-center" class="col-lg-12">
                <div class="page checkout-completed-page">
                    <div class="heading mt-3">
                        <h1 class="heading-title font-weight-light">Your order has been received</h1>
                    </div>

                    <h3 class="text-muted font-weight-light">
                        Thank you for your purchase!
                    </h3>

                    <div class="page-body checkout-data pt-4">
                        <div class="order-completed">

                            <div class="body fs-h5">
                                <p>
                                    Your order number: &nbsp;
                                    <a href="{{url('/Order/Details')}}/{{$order_id}}" rel="nofollow">
                                        <strong>{{$order_id}}</strong>
                                    </a>
                                </p>
                            </div>
                            <p class="pt-3 mb-5">
                                <a href="{{url('/Order/Details')}}/{{$order_id}}" class="btn btn-warning" rel="nofollow">
                                    <span>Order details</span>
                                </a>
                                <a href="{{url('/')}}" class="btn btn-secondary order-completed-continue-button">
                                    <span>Continue shopping</span>
                                </a>
                            </p>
                        </div>
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
  
<script>
    $(function () {
        
    });
</script>
@endsection