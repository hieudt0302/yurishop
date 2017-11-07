@extends('layouts.master')
@section('title','Pokofarms - Wishlist')

@section('header')
@parent
    <!-- OVERRIDER MASTER CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom-order.css') }}">
@stop

@section('content')
    <div id="content-wrapper" >
        <section id="content" class="container mt-3">
            <!-- row row-hardcode -->
            <div id="content-body" class="row row-hardcode mt-4">
                <div id="content-center" class="col-lg-12">
                    <div class="page shopping-cart-page">
                        <div class="page-title">
                            <h1 class="h3">@lang('shoppings.wishlist')</h1>
                        </div>
                        <div class="page-body">
                            <div class="order-summary-content">
                                @if(Cart::instance('wishlist')->count() >0)
                                <form action="{{url('/cart')}}" enctype="multipart/form-data" method="GET" novalidate="novalidate">
                                <!-- {{ csrf_field() }} -->
                                    <div class="card">
                                        <div id="cart-items" class="cart mb-0 cart-editable">
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
                                                @foreach(Cart::instance('wishlist')->content() as $row)
                                                <div id="{{$row->rowId}}" class="cart-row">
                                                    <div class="cart-col cart-col-main">
                                                        <div class="row row-hardcode sm-gutters">
                                                            <div class="col cart-item-img">
                                                                @if(strlen($row->options->source??'')> 0)
                                                                <img class="img-fluid" alt="{{$row->name}}" src="{{asset('/storage')}}/{{$row->options->source}}" title="{{$row->name}}">
                                                                @else 
                                                                <img class="img-fluid" alt="No Image Found" src="{{asset('/images/no-image.png')}}" title="Image of Product">
                                                                @endif
                                                            </div>
                                                            <div class="col">
                                                                <a class="cart-item-link" href="{{url('/products')}}/$row->id" title="Description">{{$row->name}}</a>
                                                                <div class="cart-item-desc fs-sm">
                                                                    {{$row->options->summary}}
                                                                </div>
                                                                <!-- PUT OTHER ATTR -->
                                                                <!-- <div class="cart-item-attrs fs-sm my-2">
                                                                </div> -->
                                                                <!-- PUT SIZE AND COLOR HERE -->
                                                                <!-- <div class="attributes text-muted fs-sm mb-2">
                                                                    Size: M<br>Color: kirsch
                                                                </div> -->
                                                            </div>
                                                            <div class="col col-auto">
                                                                <div class="cart-row row row-hardcode row-actions btn-group-vertical card-shadow">
                                                                    <a class="btn btn-gray btn-to-danger btn-sm btn-icon ajax-action-link" title="Remove" href="#" rel="nofollow" data-href="/Cart/DeleteWishlistItem?ItemId={{$row->rowId}}" data-sci-item="{{$row->rowId}}" >
                                                                        <i class="fa fa-2x">×</i>
                                                                    </a>
                                                                    <a class="btn btn-secondary btn-sm btn-icon ajax-action-link" title="Move to cart" href="#" rel="nofollow" data-href="/Cart/MoveItemBetweenWishlistAndCart?ItemId={{$row->rowId}}" data-sci-item="{{$row->rowId}}">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="cart-col cart-col-price" data-caption="Price">
                                                        <span class="price">{{FormatPrice::price($row->price)}}</span>
                                                    </div>
                                                    <div class="cart-col cart-col-qty" data-caption="Quantity">
                                                        <div class="qty-input">
                                                            <!-- <div class="input-group bootstrap-touchspin">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-secondary bootstrap-touchspin-down" type="button">
                                                                        <i class="fa fa-minus"></i>
                                                                    </button>
                                                                </span>
                                                                <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span> -->
                                                                <input  class="form-control" data-href="/Cart/UpdateWishlistItem?ItemId={{$row->rowId}}" data-max="10000" data-min="1"
                                                                    data-postfix="" data-sci-item="{{$row->rowId}}" data-step="1" data-val="true" data-val-number="The field 'EnteredQuantity' must be a number." id="itemquantity{{$row->id}}" type="text" value="{{$row->qty}}" style="display: block;">
                                                                <!-- <span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-secondary bootstrap-touchspin-up" type="button">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                    <div class="cart-col cart-col-price cart-col-subtotal" data-caption="Total">
                                                        <span class="price">{{$row->total}}</span>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="cart-footer rounded-bottom">
                                            <div class="row row-hardcode">
                                                <div class="col-md-6 col-md-offset-6">
                                                    <div id="order-totals">
                                                        <table class="cart-summary">
                                                            <tbody>
                                                                <tr class="cart-summary-subtotal">
                                                                    <td class="cart-summary-label">@lang('shoppings.subtotal'):</td>
                                                                    <td class="cart-summary-value">{{FormatPrice::price(Cart::subtotal())}}</td>
                                                                </tr>
                                                                <tr class="cart-summary-shipping">
                                                                    <td class="cart-summary-label">
                                                                        <span class="text-nowrap">@lang('shoppings.shipping'):</span>
                                                                    </td>
                                                                    <td class="cart-summary-value">
                                                                        <span class="text-muted text-wrap">@lang('shoppings.calculated-during-checkout')</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="cart-summary-tax">
                                                                    <td class="cart-summary-label">@lang('shoppings.tax'):</td>
                                                                    <td class="cart-summary-value">{{FormatPrice::price(Cart::tax())}}</td>
                                                                </tr>
                                                                <tr class="cart-summary-total">
                                                                    <td class="cart-summary-label">@lang('shoppings.total'):</td>
                                                                    <td class="cart-summary-value">
                                                                        <span class="text-muted fs-h6 font-weight-normal text-wrap">@lang('shoppings.calculated-during-checkout')</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-buttons my-4 row row-hardcode">
                                        <div class="col-sm-6 col-lg-4 order-last order-sm-first mt-3 mt-sm-0">
                                            <button class="btn btn-secondary btn-block btn-lg btn-continue-shopping" type="button" >
                                                <i class="fa fa-angle-left mr-3"></i>
                                                <span>@lang('shoppings.continue-shopping')</span>
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-lg-4 ml-lg-auto">
                                            <div id="start-checkout-buttons" class="">
                                                <div class="checkout-buttons">
                                                    <button type="button" class="btn btn-primary btn-lg btn-block btn-goto-cart" >
                                                        <span>@lang('shoppings.goto-cart')</span>
                                                        <i class="fa fa-angle-right ml-3"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @else
                                <div class="alert alert-warning fade show">
                                    @lang('shoppings.wishlist-empty')
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
<!-- <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.js') }}"></script>  -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>  -->
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
<script type="text/javascript" src="{{ asset('dist/pnotify/pnotify.js') }}"></script> 
<script type="text/javascript" src="{{ asset('dist/pnotify/pnotify.animate.js') }}"></script> 

<script type="text/javascript">
$(document).ready(function(){   
   
    var orderSummary = $(".order-summary-content");
    orderSummary.on("click", ".btn-continue-shopping", function (e) {
        e.preventDefault();
        window.location.href = '{{url("/")}}'
        return false;
    });

    orderSummary.on("click", ".btn-goto-cart", function (e) {
        e.preventDefault();
        window.location.href = '{{url("/cart")}}'
        return false;
    });
    
    // remove cart item & move to wishlist
    orderSummary.on("click", ".ajax-action-link", function (e) {
        e.preventDefault();
        var link = $(this);
        updateShoppingCartItems(link, {
            "ItemId": link.data("sci-item"),
        });
        return false;
    });

    // quantity touchspin change
    orderSummary.on('change', '.qty-input .form-control', function (e) {
        e.preventDefault();
        var link = $(this);
        updateShoppingCartItems(link, {
            "ItemId": link.data("sci-item"),
            "newQuantity": link.val()
        });
        return false;
    });

    function updateShoppingCartItems(link, data) {

        showThrobber();

        $.ajax({
            cache: false,
            url: link.data("href"),
            data: data,
            type: 'POST',
            success: function (response) {
                if(response['status'] ==='success')
                {
                    if (response['newWishlistItemCount'] == 0) {
                        orderSummary.html(
                            '<div class="alert alert-warning fade show">Your Wishlist is empty!</div>'
                        );
                    }

                    if (response['type'] === 'remove') {
                        var rowItem =document.getElementById(response['rowId']);
                        rowItem.parentNode.removeChild(rowItem);
                    }
                }

                displayNotification(response['message'], response['status']);

                hideThrobber();

            }
        });
    }

    function showThrobber() {
        var cnt = $("#cart-items");
        var throbber = cnt.data('throbber');
        if (!throbber) {
            throbber = cnt.throbber({
                white: true,
                small: true,
                message: '',
                show: false,
                speed: 0
            }).data('throbber');
        }

        throbber.show();
    }

    function hideThrobber() {
        var cnt = $("#cart-items");
        _.delay(function () {
            if (cnt.data("throbber")) cnt.data("throbber").hide();
        }, 100);
    }
});
</script>
@endsection