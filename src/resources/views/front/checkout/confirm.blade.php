@extends('layouts.master')
@section('title','Xác Nhận Đơn Hàng - Pokofarms')
@section('header')
@parent
<!-- OVERRIDER MASTER CSS -->
<link rel="stylesheet" href="{{ asset('css/custom-order.css') }}">
@stop


@section('content')
<div id="content-wrapper">
    <section id="content" class="container mt-3">
        <div class="costeps row row-hardcode no-gutters">
            <div class="col-2 costep visited" data-step="cart">
                <a class="costep-link" href="{{url('/cart')}}">
                    <i class="costep-icon"></i>
                    <span class="costep-label">@lang('shoppings.cart')</span>
                </a>
            </div>
            <div class="col-2 costep visited" data-step="address">
                <a class="costep-link" href="{{url('/Checkout/BillingAddress')}}">
                    <i class="costep-icon"></i>
                    <span class="costep-label">@lang('profile.address')</span>
                </a>
            </div>
            <div class="col-2 costep visited" data-step="shipping">
                <a class="costep-link" href="{{url('/Checkout/ShippingMethod')}}">
                    <i class="costep-icon"></i>
                    <span class="costep-label">@lang('shoppings.shipping')</span>
                </a>
            </div>
            <div class="col-2 costep visited" data-step="payment">
                <a class="costep-link" href="{{url('/Checkout/PaymentMethod')}}">
                    <i class="costep-icon"></i>
                    <span class="costep-label">@lang('shoppings.payment')</span>
                </a>
            </div>
            <div class="col-2 costep active" data-step="confirm">
                <a class="costep-link" href="{{url('Checkout/Confirm')}}">
                    <i class="costep-icon"></i>
                    <span class="costep-label">@lang('shoppings.confirm')</span>
                </a>
            </div>
            <div class="col-2 costep inactive" data-step="complete">
                <a class="costep-link" href="javascript:void(0)">
                    <i class="costep-icon"></i>
                    <span class="costep-label">@lang('shoppings.complete')</span>
                </a>
            </div>
        </div>
        <div id="content-body" class="row row-hardcode mt-4">
            <div id="content-center" class="col-lg-12">
                <div class="page checkout-confirm-page">
                    <div class="page-title">
                        <h1 class="h3">@lang('checkout.confirm-order')</h1>
                    </div>
                    <div class="page-body checkout-data">                       
                            <p class="page-intro lead">
                                @lang('checkout.confirm-message')
                            </p>
                            <div class="terms-of-service alert alert-info mb-3">
                                <div class="checkbox">
                                    <label class="mb-0 form-check-label">
                                        <input id="termsofservice" type="checkbox" name="termsofservice" class="form-check-input"> @lang('checkout.agree-message')
                                    </label>
                                </div>
                                <!-- Terms of service -->
                            </div>
                            <div class="confirm-order">
                            </div>
                  
                        <div class="order-summary-body mb-4">
                            <div class="order-summary-content">
                                <div class="card card-block order-review-data-box mb-3">
                                    <div class="row row-hardcode">
                                        <div class="col-md-8">
                                            <div class="row row-hardcode">
                                                <div class="col mb-4 mb-lg-0 billinginfo">
                                                    <div class="row row-hardcode sm-gutters">
                                                        <div class="col">
                                                            <div class="heading">
                                                                <h5 class="heading-title font-weight-medium">@lang('checkout.billing-address')</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col col-auto">
                                                            <a class="btn btn-primary btn-sm change-checkout-data" href="{{url('/Checkout/BillingAddress')}}">@lang('checkout.change')</a>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <div class="company">
                                                            {{$billingaddress->company}}
                                                        </div>
                                                        <div class="name">
                                                            {{$billingaddress->last_name}} {{$billingaddress->first_name}}
                                                        </div>
                                                        <div class="address1">
                                                        {{$billingaddress->address1}}
                                                        </div>
                                                        <div class="city-state-zip">
                                                            {{$billingaddress->ciy}}, {{$billingaddress->zipcode}}
                                                        </div>
                                                        <div class="country">
                                                        {{$billingaddress->country}}
                                                        </div>
                                                    </div>
                                                    <div class="email">
                                                        Email: {{$billingaddress->email}}
                                                    </div>
                                                    <div class="phone">
                                                        Phone: {{$billingaddress->Phone}}
                                                    </div>
                                                    <div class="fax">
                                                        Fax: {{$billingaddress->fax}}
                                                    </div>
                                                </div>
                                                <div class="col mb-4 mb-lg-0 shippinginfo">
                                                    <div class="row row-hardcode sm-gutters">
                                                        <div class="col">
                                                            <div class="heading">
                                                                <h5 class="heading-title font-weight-medium">@lang('checkout.shipping-address')</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col col-auto">
                                                            <a class="btn btn-primary btn-sm change-checkout-data" href="{{url('/Checkout/ShippingAddress')}}">@lang('checkout.change')</a>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <div class="company">
                                                            {{$shippingaddress->company}}
                                                        </div>
                                                        <div class="name">
                                                            {{$shippingaddress->last_name}} {{$shippingaddress->first_name}}
                                                        </div>
                                                        <div class="address1">
                                                        {{$shippingaddress->address1}}
                                                        </div>
                                                        <div class="city-state-zip">
                                                            {{$shippingaddress->ciy}}, {{$shippingaddress->zipcode}}
                                                        </div>
                                                        <div class="country">
                                                        {{$shippingaddress->country}}
                                                        </div>
                                                    </div>
                                                    <div class="email">
                                                        Email: {{$shippingaddress->email}}
                                                    </div>
                                                    <div class="phone">
                                                        Phone: {{$shippingaddress->Phone}}
                                                    </div>
                                                    <div class="fax">
                                                        Fax: {{$shippingaddress->fax}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row row-hardcode">
                                                <div class="col">
                                                    <div class="row row-hardcode sm-gutters">
                                                        <div class="col">
                                                            <div class="heading">
                                                                <h5 class="heading-title font-weight-medium">@lang('checkout.shipping-method')</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col col-auto">
                                                            <a class="btn btn-primary btn-sm change-checkout-data" href="{{url('/Checkout/ShippingMethod')}}">@lang('checkout.change')</a>
                                                        </div>
                                                    </div>
                                                    <p>{{__('method.shipping.'. $shippingMethodId . '.name')}}</p>
                                                    <div class="row row-hardcode sm-gutters">
                                                        <div class="col">
                                                            <div class="heading">
                                                                <h5 class="heading-title font-weight-medium">@lang('checkout.payment-method')</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col col-auto">
                                                            <a class="btn btn-primary btn-sm change-checkout-data" href="{{'/Checkout/PaymentMethod'}}">@lang('checkout.change')</a>
                                                        </div>
                                                    </div>
                                                    <p>{{__('method.payment.'. $paymentMethodId . '.name')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <form action="{{url('/Checkout/Confirm/Next')}}" id="confirm-order-form" method="post">
                                    {{ csrf_field() }}	
                                    <div class="comment-box card mb-3">
                                        <div class="card-header h5">
                                            @lang('checkout.checkout-comment')
                                        </div>
                                        <div class="card-block">
                                            <textarea class="form-control" cols="20" id="CustomerComment" name="note" placeholder="{{ __('checkout.optional')}}" rows="2"></textarea>
                                        </div>
                                    </div>
                                </form>
                                <div class="card">
                                    <div id="cart-items" class="cart mb-0">
                                        <div class="cart-head">
                                            <div class="cart-row">
                                                <div class="cart-col cart-col-main">
                                                    @lang('shoppings.products')
                                                </div>
                                                <div class="cart-col cart-col-price">
                                                    @lang('shoppings.price')
                                                </div>
                                                <div class="cart-col cart-col-qty">
                                                    @lang('shoppings.qty')
                                                </div>
                                                <div class="cart-col cart-col-price cart-col-subtotal">
                                                    @lang('shoppings.total')
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-body">
                                            @foreach(Cart::content() as $row)
                                            <div class="cart-row">
                                                <div class="cart-col cart-col-main">
                                                    <div class="row row-hardcode sm-gutters">
                                                        <div class="col cart-item-img">
                                                            <img class="img-fluid" alt="Picture of Item" 
                                                            src="{{asset('/storage')}}/{{$row->options->source}}"
                                                                title="Show details for Herren T-Shirt">
                                                        </div>
                                                        <div class="col">
                                                            <a class="cart-item-link" href="{{url('/products')}}/$row->id" title="Description">{{$row->name}}</a>
                                                            <div class="cart-item-desc fs-sm">
                                                            {{$row->options->summary}}
                                                            </div>
                                                            <!-- <div class="cart-item-attrs fs-sm my-2">
                                                                Atributes
                                                            </div> -->
                                                            <!-- <div class="attributes text-muted fs-sm mb-2">
                                                                Size: M
                                                                <br>Color: Red
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cart-col cart-col-price" data-caption="Price">
                                                    <span class="price">{{FormatPrice::price($row->price)}}</span>
                                                </div>
                                                <div class="cart-col cart-col-qty" data-caption="Quantity">
                                                    <span>{{$row->qty}}</span>
                                                </div>

                                                <div class="cart-col cart-col-price cart-col-subtotal" data-caption="Total">
                                                    <span class="price">{{FormatPrice::price($row->total)}}</span>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="cart-footer rounded-bottom">
                                        <div class="row row-hardcode">
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-6">
                                                <div id="order-totals">
                                                    <table class="cart-summary">
                                                        <tbody>
                                                            <tr class="cart-summary-subtotal">
                                                                <td class="cart-summary-label">@lang('shoppings.subtotal'):</td>
                                                                <td class="cart-summary-value">{{FormatPrice::price(Cart::subtotal())}}</td>
                                                            </tr>
                                                            <tr class="cart-summary-shipping">
                                                                <td class="cart-summary-label">
                                                                    <span class="text-nowrap">@lang('checkout.shipping'):</span>
                                                                    <span class="font-weight-medium">
                                                                        Pickup
                                                                    </span>
                                                                </td>
                                                                <td class="cart-summary-value">
                                                                    <span class="cart-summary-neg">{{FormatPrice::price(0.00)}}</span>
                                                                </td>
                                                            </tr>

                                                            <tr class="cart-summary-tax">
                                                                <td class="cart-summary-label">@lang('shoppings.tax'):</td>
                                                                <td class="cart-summary-value">{{FormatPrice::price(Cart::tax())}}</td>
                                                            </tr>
                                                            <tr class="cart-summary-total">
                                                                <td class="cart-summary-label">@lang('shoppings.total'):</td>
                                                                <td class="cart-summary-value">
                                                                    <span>{{ FormatPrice::price(Cart::total()) }}</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cart-buttons my-4 row row-hardcode">
                            <div class="col-sm-6 col-lg-4 order-last order-sm-first mt-3 mt-sm-0">
                                <a class="btn btn-secondary btn-lg btn-block" href="{{url('/Checkout/PaymentMethod')}}">
                                    <i class="fa fa-angle-left mr-3"></i>
                                    <span>@lang('checkout.back')</span>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-4 ml-lg-auto">
                                <button class="btn btn-danger btn-lg btn-block btn-buy" onclick="return false;">
                                    <span>@lang('checkout.next')</span>
                                    <i class="fa fa-angle-right ml-3"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.js"></script> 
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>  -->
<script type="text/javascript" src="{{ asset('js/viewport.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/SmoothScroll.js') }}"></script> 
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
<script type="text/javascript" src="{{ asset('dist/pnotify/pnotify.js') }}"></script> 
<script type="text/javascript" src="{{ asset('dist/pnotify/pnotify.animate.js') }}"></script> 
 
    <script type="text/javascript">
        $(document).ready(function () {
            $("#terms-of-service-trigger").on("click", function (event) {
                event.preventDefault();
                $("#terms-of-service-modal .modal-body").html(
                    '<iframe id="iframe-terms-of-service" src="/frontend/en/t-popup/conditionsofuse" frameBorder="0" />'
                );
            });
            $("#disclaimer-trigger").on("click", function (event) {
                event.preventDefault();
                $("#terms-of-service-modal .modal-body").html(
                    '<iframe id="iframe-terms-of-service" src="/frontend/en/t-popup/disclaimer" frameBorder="0" />'
                );
            });
        });
    </script>
	
<script>
    $(function () {
        $('#confirm-order-form').submit(function () {
            $('.btn-buy', this).attr('disabled', 'disabled');
        });
        var checkoutButton = $(".btn-buy");
        checkoutButton.on("click", function () {
            var termOfServiceOk = true,
                userAgreementsOk = true,
                esdRevocationWaiverOk = true;

            var cartItems = $('#cart-items');

            $("#customercommenthidden").val($("#CustomerComment").val());
            $('#SubscribeToNewsLetterHidden').val($('input[name=SubscribeToNewsLetter]')
                .is(':checked'));
            $('#AcceptThirdPartyEmailHandOverHidden').val($(
                'input[name=AcceptThirdPartyEmailHandOver]').is(':checked'));

            // terms of services

            if (!$('#termsofservice').is(':checked')) {
                displayNotification(
                    'Please accept the terms of service before the next step.',
                    "error");
                termOfServiceOk = false;
                $.scrollTo($('#termsofservice'), 800, {
                    offset: -70
                });
            } else {
                termOfServiceOk = true;
            }


            // agree user agreement for downloadable products
            cartItems.find('input[name^=AgreeUserAgreement]').each(function () {
                if (!$(this).is(':checked')) {
                    userAgreementsOk = false;
                    displayNotification(
                        'Please agree to the user agreement for downloadable products.',
                        'error');
                    if (termOfServiceOk) {
                        $.scrollTo(cartItems, 800, {
                            offset: -20
                        });
                    }
                    return false;
                }
            });

            // agree esd revocation waiver

            cartItems.find('input[name^=AgreeEsdRevocationWaiver]').each(function () {
                if (!$(this).is(':checked')) {
                    esdRevocationWaiverOk = false;
                    displayNotification(
                        'Please confirm that you would like access to the digital content immediately.',
                        'error');
                    if (termOfServiceOk) {
                        $.scrollTo(cartItems, 800, {
                            offset: -20
                        });
                    }
                    return false;
                }
            });


            if (termOfServiceOk && userAgreementsOk && esdRevocationWaiverOk) {
                var submitOrderEvent = jQuery.Event('submitOrder');
                submitOrderEvent.isOrderValid = true;
                submitOrderEvent.isMobile = false;

                $(this).trigger(submitOrderEvent);

                if (true === submitOrderEvent.isOrderValid) {
                    checkoutButton.attr("disabled", "disabled");
                    checkoutButton.find(".fa-angle-right")
                        .removeClass("fa-angle-right")
                        .addClass("fa-spinner fa-spin");

                    $('#confirm-order-form').submit();
                }
            }
        });
    });
</script>
@endsection
