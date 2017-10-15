@extends('layouts.master')
@section('title','Xác Nhận Đơn Hàng - Cà Phê Đăk Hà')
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
            <div class="col-2 costep visited" data-step="payment">
                <a class="costep-link" href="/frontend/en/Checkout/PaymentMethod">
                    <i class="costep-icon"></i>
                    <span class="costep-label">Payment</span>
                </a>
            </div>
            <div class="col-2 costep active" data-step="confirm">
                <a class="costep-link" href="/frontend/en/Checkout/Confirm">
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
                <div class="page checkout-confirm-page">
                    <div class="page-title">
                        <h1 class="h3">Please confirm your order.</h1>
                    </div>
                    <div class="page-body checkout-data">
                        <form action="{{url('/Checkout/Confirm/Next')}}" id="confirm-order-form" method="post">
                        {{ csrf_field() }}	
                            <p class="page-intro lead">
                                Please verify the order total and the specifics regarding the billing address and, if required, the shipping address. You
                                can make corrections to your entry anytime by clicking on
                                <strong>back</strong>. If everything is as it should be, deliver your order to us by clicking
                                <strong>confirm</strong>.
                            </p>
                            <input type="hidden" id="customercommenthidden" name="customercommenthidden">
                            <input type="hidden" id="SubscribeToNewsLetterHidden" name="SubscribeToNewsLetterHidden">
                            <input type="hidden" id="AcceptThirdPartyEmailHandOverHidden" name="AcceptThirdPartyEmailHandOverHidden">
                            <div class="terms-of-service alert alert-info mb-3">
                                
                                <div class="checkbox">
                                    <label class="mb-0 form-check-label">
                                        <input id="termsofservice" type="checkbox" name="termsofservice" class="form-check-input"> I agree with the terms of service and I adhere to them unconditionally
                                    </label>
                                </div>

                                <!-- Terms of service -->
                            </div>
                            <div class="confirm-order">
                            </div>
                        </form>
                        <div class="order-summary-body mb-4">
                            <div class="order-summary-content">
                                <div class="card card-block order-review-data-box mb-3">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col mb-4 mb-lg-0 billinginfo">
                                                    <div class="row sm-gutters">
                                                        <div class="col">
                                                            <div class="heading">
                                                                <h5 class="heading-title font-weight-medium">Billing Address</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col col-auto">
                                                            <a class="btn btn-primary btn-sm change-checkout-data" href="{{url('/Checkout/BillingAddress')}}">Change</a>
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
                                                    <div class="row sm-gutters">
                                                        <div class="col">
                                                            <div class="heading">
                                                                <h5 class="heading-title font-weight-medium">Shipping Address</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col col-auto">
                                                            <a class="btn btn-primary btn-sm change-checkout-data" href="{{url('/Checkout/ShippingAddress')}}">Change</a>
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
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row sm-gutters">
                                                        <div class="col">
                                                            <div class="heading">
                                                                <h5 class="heading-title font-weight-medium">Shipping Method</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col col-auto">
                                                            <a class="btn btn-primary btn-sm change-checkout-data" href="{{url('/Checkout/ShippingMethod')}}">Change</a>
                                                        </div>
                                                    </div>
                                                    <p>Pickup</p>
                                                    <div class="row sm-gutters">
                                                        <div class="col">
                                                            <div class="heading">
                                                                <h5 class="heading-title font-weight-medium">Payment Method</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col col-auto">
                                                            <a class="btn btn-primary btn-sm change-checkout-data" href="{{'/Checkout/PaymentMethod'}}">Change</a>
                                                        </div>
                                                    </div>
                                                    <p>Cash on delivery</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="comment-box card mb-3">
                                    <div class="card-header h5">
                                        Do you want to tell us something regarding this order?
                                    </div>
                                    <div class="card-block">
                                        <textarea class="form-control" cols="20" id="CustomerComment" name="note" placeholder="Optional" rows="2"></textarea>
                                    </div>
                                </div>
                                <form action="#" enctype="multipart/form-data" method="post">
                                    <div class="card">
                                        <div id="cart-items" class="cart mb-0">
                                            <div class="cart-head">
                                                <div class="cart-row">
                                                    <div class="cart-col cart-col-main">
                                                        Product(s)
                                                    </div>
                                                    <div class="cart-col cart-col-price">
                                                        Price
                                                    </div>
                                                    <div class="cart-col cart-col-qty">
                                                        Qty.
                                                    </div>
                                                    <div class="cart-col cart-col-price cart-col-subtotal">
                                                        Total
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cart-body">
                                                @foreach(Cart::content() as $row)
                                                <div class="cart-row">
                                                    <div class="cart-col cart-col-main">
                                                        <div class="row sm-gutters">
                                                            <div class="col cart-item-img">
                                                                <img class="img-fluid" alt="Picture of Item" src="{{asset('images/default-image-250.png')}}"
                                                                    title="Show details for Herren T-Shirt">
                                                            </div>
                                                            <div class="col">
                                                                <a class="cart-item-link" href="/frontend/en/t-shirt-3?size-221-0-180=3546&amp;color-221-0-181=3550" title="Description">Herren T-Shirt</a>
                                                                <!-- <div class="cart-item-desc fs-sm">
                                                                    Description
                                                                </div> -->
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
                                                        <span class="price">{{$row->price}}</span>
                                                    </div>
                                                    <div class="cart-col cart-col-qty" data-caption="Quantity">
                                                        <span>{{$row->qty}}</span>
                                                    </div>

                                                    <div class="cart-col cart-col-price cart-col-subtotal" data-caption="Total">
                                                        <span class="price">{{$row->total}}</span>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="cart-footer rounded-bottom">
                                            <div class="row">
                                                <div class="col-md-6">
                                                </div>
                                                <div class="col-md-6">
                                                    <div id="order-totals">
                                                        <table class="cart-summary">
                                                            <tbody>
                                                                <tr class="cart-summary-subtotal">
                                                                    <td class="cart-summary-label">Subtotal:</td>
                                                                    <td class="cart-summary-value">{{$row->subtotal()}}</td>
                                                                </tr>
                                                                <tr class="cart-summary-shipping">
                                                                    <td class="cart-summary-label">
                                                                        <span class="text-nowrap">Shipping:</span>
                                                                        <span class="font-weight-medium">
                                                                            Pickup
                                                                        </span>
                                                                    </td>
                                                                    <td class="cart-summary-value">
                                                                        <span class="cart-summary-neg">$0.00</span>
                                                                    </td>
                                                                </tr>

                                                                <tr class="cart-summary-tax">
                                                                    <td class="cart-summary-label">Tax:</td>
                                                                    <td class="cart-summary-value">{{$row->tax()}}</td>
                                                                </tr>
                                                                <tr class="cart-summary-total">
                                                                    <td class="cart-summary-label">Total:</td>
                                                                    <td class="cart-summary-value">
                                                                        <span>$69.96</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="cart-buttons my-4 row">
                            <div class="col-sm-6 col-lg-4 order-last order-sm-first mt-3 mt-sm-0">
                                <a class="btn btn-secondary btn-lg btn-block" href="{{url('/Checkout/PaymentMethod')}}">
                                    <i class="fa fa-angle-left mr-3"></i>
                                    <span>Back</span>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-4 ml-lg-auto">
                                <button class="btn btn-danger btn-lg btn-block btn-buy" onclick="return false;">
                                    <span>Confirm</span>
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
